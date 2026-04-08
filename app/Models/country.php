<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    use HasFactory;
    protected $table = 'country';
    protected $fillable = ['country_name'];

    public function state()
    {
        return $this->hasMany(state::class, 'country_id', 'id');
    }
    public function city()
    {
        return $this->hasManyThrough(city::class, state::class, 'country_id', 'state_id', 'id', 'id');
    }
}
