<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class withdrawals extends Model
{
    use HasFactory;
    protected $table = 'withdrawals';
    protected $fillable = [
        'store_id',
        'user_id',
        'amount',
        'currency',
        'status',
        'payment_method',
        'notes',
        'processed_at',
        'withdrawal_date',
        'is_deleted',
    ];

    protected $dates = ['processed_at', 'withdrawal_date'];

    public function stores()
    {
        return $this->belongsTo(\App\Models\stores::class, 'store_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\users::class, 'user_id', 'id');
    }
}
