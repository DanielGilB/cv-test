<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'table_id',
        'slots',
        'name',
        'date'
    ];

    public function table()
    {
        return $this->belongsTo('App\Models\Table');
    }
}
