<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function station()
    {
        return $this->belongsTo(station::class);
    }

    public function seat()
    {
        return $this->belongsTo(Seat::class);
    }
}
