<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_permission extends Model
{
    use HasFactory;
    protected $table='user_permission';
    protected $fillable=['feature_id','can_view','can_create','can_edit','can_delete','user_id'];

    // 🔹 UserPermission belongs to a user
    public function users()
    {
        return $this->belongsTo(\App\Models\users::class, 'user_id', 'id');
    }

    // 🔹 UserPermission belongs to a feature
    public function features()
    {
        return $this->belongsTo(\App\Models\features::class, 'feature_id', 'id');
    }
}
