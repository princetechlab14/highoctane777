<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leads extends Model
{
    use HasFactory;
    protected $table = 'leads';
    protected $fillable = ['name', 'country_code', 'mobile', 'email', 'date', 'status', 'source', 'subject', 'message', 'page_id', 'cancel_reason', 'notification_status'];

    public function leadfollow()
    {
        return $this->hasMany(leadfollow::class, 'l_id', 'id');
    }
}
