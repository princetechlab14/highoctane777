<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leadfollow extends Model
{
    use HasFactory;
    protected $table='leadfollow';
    protected $fillable=['l_id','date','comment','n_f_date'];

    public function leads()
    {
        return $this->belongsTo(leads::class, 'l_id', 'id');
    }
}
