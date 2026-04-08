<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emailinfo extends Model
{
    use HasFactory;
    protected $table = 'emailinfo';
    protected $fillable = ['email'];
}
