<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactions extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $fillable = [
        'transaction_id',
        'user_id',
        'store_id',
        'platform_id',
        'amount',
        'currency',
        'payment_method',
        'status',
        'is_winner',
        'winning_amount',
        'paid_amount',
        'payout_status',
        'timezone',
        'transaction_at',
        'payment_response',
        'customer_name',
        'customer_email',
        'customer_countrycode',
        'customer_mobile',
        'customer_mobileid',
        'customer_username',
        'is_transferred',
        'transferred_from_store_id',
        'transferred_by',
        'transferred_at',
        'date',
    ];

    protected $casts = [
        'transaction_at' => 'datetime',
        'transferred_at' => 'datetime',
        'payment_response' => 'array',
        'is_transferred' => 'boolean',
        'amount' => 'decimal:2',
        'winning_amount' => 'decimal:2',
        'paid_amount' => 'decimal:2',
    ];

    // 🔹 Transaction belongs to a user
    public function users()
    {
        return $this->belongsTo(\App\Models\users::class, 'user_id', 'id');
    }

    // 🔹 Transaction belongs to a store
    public function stores()
    {
        return $this->belongsTo(\App\Models\stores::class, 'store_id', 'id');
    }

    // 🔹 Transaction belongs to a store
    public function platform()
    {
        return $this->belongsTo(\App\Models\platform::class, 'platform_id', 'id');
    }

    // 🔹 Refunds (payouts)
    public function payouts()
    {
        return $this->hasMany(\App\Models\payouts::class, 'transaction_id', 'transaction_id');
    }

    public function transferredFromStore()
    {
        return $this->belongsTo(\App\Models\stores::class, 'transferred_from_store_id', 'id');
    }

    public function transferredByUser()
    {
        return $this->belongsTo(\App\Models\users::class, 'transferred_by', 'id');
    }

    // ✅ HELPER: total paid
    public function getTotalPaidAttribute()
    {
        return $this->payouts()->where('status', 'paid')->sum('amount');
    }

    // ✅ HELPER: remaining payout
    public function getRemainingAmountAttribute()
    {
        return $this->winning_amount - $this->total_paid;
    }
}
