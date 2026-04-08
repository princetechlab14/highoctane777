<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pages extends Model
{
    use HasFactory;
    protected $table = 'pages';
    protected $fillable = ['title', 'url', 'category_id', 'subcategory_id', 'image', 'thumbnail_alt', 'thumbnail_title', 'content', 'meta_title', 'meta_description', 'canonical_url', 'keywords', 'schema', 'status', 'type', 'date', 'eventstatus', 'eventdate'];

    public function page_section()
    {
        return $this->hasMany(page_section::class, 'p_id', 'id');
    }
    public function blogcategory()
    {
        return $this->belongsTo(blogcategory::class, 'category_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(category::class, 'category_id', 'id');
    }
    public function subcategory()
    {
        return $this->belongsTo(category::class, 'subcategory_id', 'id');
    }
    public function comment()
    {
        return $this->hasMany(comment::class, 'page_id', 'id');
    }
}
