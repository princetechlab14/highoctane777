<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contactinfo extends Model
{
    use HasFactory;
    protected $table = 'contactinfo';
    protected $fillable = ['country_code', 'mobile_no'];
}
