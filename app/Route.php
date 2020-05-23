<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    public function syncSeatsAvailability($seatId)
    {
        $stationsIds = StationTrip::routeStations($this->from, $this->to);

        $availabilities = [];
        $stationsIds->each(function ($stationId) use (&$availabilities, $seatId) {
            $availability = new Availability();
            $availability->station_id = $stationId;
            $availability->seat_id = $seatId;
            $availabilities[] = $availability;
        });


        $this->trip->availabilities()->saveMany($availabilities);
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
