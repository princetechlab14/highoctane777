<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $fillable = ['username', 'name', 'email', 'country_code', 'mobile', 'password', 'address' ,'user_type', 'p_image', 'role_id', 'store_id', 'max_payout_limit', 'used_payout_amount', 'ftoken', 'date', 'is_active', 'remember_token'];

    // 🔹 Role relationship (user belongs to one role)
    public function roles()
    {
        return $this->belongsTo(\App\Models\roles::class, 'role_id', 'id');
    }

    // 🔹 Store relationship (user belongs to one store)
    public function stores()
    {
        return $this->belongsTo(\App\Models\stores::class, 'store_id', 'id');
    }

    // 🔹 Transactions made by user
    public function transactions()
    {
        return $this->hasMany(\App\Models\transactions::class, 'user_id', 'id');
    }

    // 🔹 User permissions (overrides role permissions
    public function user_permission()
    {
        return $this->hasMany(\App\Models\user_permission::class, 'user_id', 'id');
    }

    // 🔹 Payouts RECEIVED (customer)
    public function payouts()
    {
        return $this->hasMany(\App\Models\payouts::class, 'user_id');
    }

    // 🔹 Payouts CREATED (admin/staff)
    public function givenPayouts()
    {
        return $this->hasMany(\App\Models\payouts::class, 'created_by');
    }

    // 🔹 Remaining payout limit
    public function getRemainingLimitAttribute()
    {
        return $this->max_payout_limit - $this->used_payout_amount;
    }

    // 🔹 staff_sessions made by user
    public function staff_sessions()
    {
        return $this->hasMany(\App\Models\staff_sessions::class, 'user_id', 'id');
    }

    // 🔹 withdrawals made by user
    public function withdrawals()
    {
        return $this->hasMany(\App\Models\withdrawals::class, 'user_id', 'id');
    }

    public function hasPermission($featureSlug, $action)
    {
        $column = 'can_' . $action;

        // 1️⃣ Check user specific permission first
        $feature = features::where('slug', $featureSlug)->first();
        if (!$feature) return false;

        $userPermission = user_permission::where('user_id', $this->id)
            ->where('feature_id', $feature->id)
            ->first();

        if ($userPermission) {
            return (bool) $userPermission->$column;
        }

        // 2️⃣ Fallback to role permission
        if (!$this->roles) return false;

        $roleFeature = $this->roles->features()
            ->where('feature_id', $feature->id)
            ->first();

        return $roleFeature ? (bool) $roleFeature->pivot->$column : false;
    }
}