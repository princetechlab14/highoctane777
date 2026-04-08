<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blogcategory extends Model
{
    use HasFactory;
    protected $table='blogcategory';
    protected $fillable=['blog_category_name', 'blog_category_url'];

    public function pages()
    {
        return $this->hasMany(pages::class, 'category_id', 'id');
    }
}
