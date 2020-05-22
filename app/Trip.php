<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    public function generateRoutes()
    {
        $stations = $this->stationsIds();

        foreach ($stations as $index => $stationId) {
            for ($i = $index + 1; $i < $stations->count(); ++$i) {
                $route = new Route();
                $route->from = $stationId;
                $route->to = $stations[$i];
                $route->price = $index + $i;

                $this->routes()->save($route);
            }
        }
    }

    public function stationsIds()
    {
        return $this->stations()
            ->orderBy('station_trip.id')
            ->pluck('station_trip.station_id');
    }

    public function stations()
    {
        return $this->belongsToMany(Station::class)->withPivot('id');
    }

    public function routes()
    {
        return $this->hasMany(Route::class);
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

}
