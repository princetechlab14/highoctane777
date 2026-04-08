<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = ['category_name', 'category_url', 'category_image', 'category_image_title', 'category_image_alt', 'meta_title', 'meta_description', 'content', 'p_c_id'];

    // To get the parent category (if it's a subcategory)
    public function parentCategory()
    {
        return $this->belongsTo(category::class, 'p_c_id', 'id');
    }
    // To get the subcategories (if it's a parent category)
    public function subCategories()
    {
        return $this->hasMany(category::class, 'p_c_id', 'id');
    }
    
    public function pages()
    {
        return $this->hasMany(pages::class, 'category_id', 'id');
    }
}
