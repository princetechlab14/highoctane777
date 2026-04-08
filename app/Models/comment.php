<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $table='comment';
    protected $fillable=['page_id','name','email','website','comment','status','reply_id','c_date'];

    public function pages()
    {
        return $this->belongsTo(pages::class, 'page_id', 'id');
    }
}
