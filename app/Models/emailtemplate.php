<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emailtemplate extends Model
{
    use HasFactory;
    protected $table = 'emailtemplate';
    protected $fillable = ['title', 'template', 'is_delete'];

    public function attachments()
    {
        return $this->hasMany(email_attachment::class, 'e_id', 'id');
    }
}
