<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    public function trips()
    {
        return $this->belongsToMany(Trip::class)->withPivot('id');
    }
}
