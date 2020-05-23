<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StationTrip extends Model
{
    protected $table = 'station_trip';

    public static function routeStations($startStationId, $endStationId)
    {
        return self::whereBetween('station_id', [$startStationId, $endStationId])
            ->whereNotIn('station_id', [$endStationId])
            ->orderBy('id', 'asc')
            ->pluck('station_id');
    }
}
