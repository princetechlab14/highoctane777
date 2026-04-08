<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staff_sessions extends Model
{
    use HasFactory;
    protected $table = 'staff_sessions';
    protected $fillable = [
        'user_id',
        'login_at',
        'logout_at',
        'store_id',
        'date',
        'timezone',
        'status',
    ];

    // 🔹 Payouts belongs to a user
    public function users()
    {
        return $this->belongsTo(\App\Models\users::class, 'user_id', 'id');
    }
}
