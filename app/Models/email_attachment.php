<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class email_attachment extends Model
{
    use HasFactory;
    protected $table = 'email_attachment';
    protected $fillable = ['e_id', 'attachment'];

    public function emailtemplate()
    {
        return $this->belongsTo(emailtemplate::class, 'e_id', 'id');
    }
}
