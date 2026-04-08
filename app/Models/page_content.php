<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class page_content extends Model
{
    use HasFactory;
    protected $table='page_content';
    protected $fillable=['s_id','content_image','image_alt','image_title','content','sequence','cdate'];

    public function page_section()
    {
        return $this->belongsTo(page_section::class, 's_id' ,'id');
    }
}
