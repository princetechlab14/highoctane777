<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
    use HasFactory;
    protected $table='slider';
    protected $fillable=['banner_image','image_title','image_alt','heading','sub_heading','button_text','button_link'];
}
