<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Availability extends Model
{

    public static function bestSeat($tripId, $startStationId, $endStationId)
    {
        return self::availabilityQuery($tripId, $startStationId, $endStationId)
            ->first();
    }

    /**
     * @param $tripId
     * @param $startStationId
     * @param $endStationId
     * @return mixed
     */
    protected static function availabilityQuery($tripId, $startStationId, $endStationId)
    {
        return self::where('trip_id', $tripId)
            ->whereNotBetween('station_id', [
                $startStationId,
                $endStationId,
            ])
            ->select(
                'seat_id',
                DB::raw('count(*) as total'),
                DB::raw('min(id) as id'),
                DB::raw('min(station_id) as station_id')
            )
            ->groupBy('seat_id')
            ->whereHas('seat')
            ->with('seat')
            ->orderBy('total', 'DESC');
    }

    public static function availableSeats($tripId, $startStationId, $endStationId)
    {
        return self::availabilityQuery($tripId, $startStationId, $endStationId)
            ->get();
    }

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
