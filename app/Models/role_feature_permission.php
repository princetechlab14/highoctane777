<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role_feature_permission extends Model
{
    use HasFactory;
    protected $table = 'role_feature_permission';
    protected $fillable = ['role_id','feature_id','can_view','can_create','can_edit','can_delete'];
}