<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payouts extends Model
{
    use HasFactory;

    protected $table = 'payouts';
    protected $fillable = [
        'user_id',
        'created_by',
        'transaction_id',
        'stripe_id',
        'amount',
        'reason',
        'status',
        'source',
        'date',
    ];

    // 🔹 Customer (who receives refund)
    public function user()
    {
        return $this->belongsTo(\App\Models\users::class, 'user_id');
    }

    // 🔹 Admin/Staff (who created refund)
    public function createdBy()
    {
        return $this->belongsTo(\App\Models\users::class, 'created_by');
    }

    // 🔹 Related transaction
    public function transaction()
    {
        return $this->belongsTo(\App\Models\transactions::class, 'transaction_id', 'transaction_id');
    }
}
