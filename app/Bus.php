<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    public function seats()
    {
        return $this->hasMany(Seat::class);
    }
}
