<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class platform extends Model
{
    use HasFactory;
    protected $table = 'platform';
    protected $fillable = ['name','slug'];

    // 🔹 Feature has many user permissions
    public function transactions()
    {
        return $this->hasMany(\App\Models\transactions::class, 'platform_id', 'id');
    }
}
