<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class features extends Model
{
    use HasFactory;
    protected $table = 'features';
    protected $fillable = ['name','slug'];

    // 🔹 Feature belongs to many roles
    public function roles()
    {
        return $this->belongsToMany(\App\Models\roles::class, 'role_feature_permission')
                    ->withPivot(['can_view','can_create','can_edit','can_delete'])
                    ->withTimestamps();
    }

    // 🔹 Feature has many user permissions
    public function user_permissions()
    {
        return $this->hasMany(\App\Models\user_permission::class, 'feature_id', 'id');
    }
}
