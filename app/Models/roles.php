<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $fillable = ['name', 'user_type', 'is_delete'];

    // 🔹 Role has many users
    public function users()
    {
        return $this->hasMany(\App\Models\users::class, 'role_id', 'id');
    }

    // 🔹 Role belongs to many features (pivot: role_feature_permission)
    public function features()
    {
        return $this->belongsToMany(\App\Models\features::class, 'role_feature_permission')
                    ->withPivot(['can_view','can_create','can_edit','can_delete'])
                    ->withTimestamps();
    }
}
