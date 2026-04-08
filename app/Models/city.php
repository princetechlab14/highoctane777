<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    use HasFactory;
    protected $table = 'city';
    protected $fillable = ['city_name', 'state_id', 'country_id'];
    
    public function state()
    {
        return $this->belongsTo(state::class, 'state_id', 'id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}
