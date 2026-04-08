<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stores extends Model
{
    use HasFactory;
    protected $table = 'stores';
    protected $fillable = ['store_type','name','country_code','mobile','email','location','qr_code','payment_url','is_active','store_image'];

    // 🔹 Users assigned to this store
    public function users()
    {
        return $this->hasMany(\App\Models\users::class, 'store_id', 'id');
    }

    // 🔹 Transactions done in this store
    public function transactions()
    {
        return $this->hasMany(\App\Models\transactions::class, 'store_id', 'id');
    }

    // 🔹 Withdrawals made by this store
    public function withdrawals()
    {
        return $this->hasMany(\App\Models\withdrawals::class, 'store_id', 'id');
    }

    public function isPhysical()
    {
        return $this->store_type === 'physical';
    }

    public function isOnline()
    {
        return $this->store_type === 'online';
    }
}
