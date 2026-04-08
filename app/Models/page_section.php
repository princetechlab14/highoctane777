<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class page_section extends Model
{
    use HasFactory;
    protected $table='page_section';
    protected $fillable=['p_id','heading','sequence','sdate'];

    public function pages()
    {
        return $this->belongsTo(pages::class, 'p_id', 'id');
    }

    public function page_content()
    {
        return $this->hasMany(page_content::class, 's_id' ,'id');
    }
}
