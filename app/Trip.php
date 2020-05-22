<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function syncSeatsAvailability()
    {
        if ($this->bus) {

            $availabilities = [];
            $this->bus->seats->each(function ($seat) use (&$availabilities){
                $availability = new Availability();
                $availability->station_id = 0;
                $availability->seat_id = $seat->id;
                $availabilities[] = $availability;
            });

            $this->availabilities()->saveMany($availabilities);
        }

    }

    public function availabilities()
    {
        return $this->hasMany(Availability::class);
    }

}
