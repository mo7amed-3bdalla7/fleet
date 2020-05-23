<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{

    public static function bestAvailableSeat($tripId, $startStationId, $endStationId)
    {
        return self::availableSeatsQuery($tripId, $startStationId, $endStationId)
            ->first();
    }

    /**
     * @param $tripId
     * @param $startStationId
     * @param $endStationId
     * @return mixed
     */
    protected static function availableSeatsQuery($tripId, $startStationId, $endStationId)
    {

        $reservedSeatsIds = Availability::where('trip_id', $tripId)
            ->whereBetween('station_id', [
                $startStationId,
                $endStationId,
            ])->pluck('seat_id');

        return Seat::whereNotIn('id', $reservedSeatsIds);
    }

    public static function availableSeats($tripId, $startStationId, $endStationId)
    {
        return self::availableSeatsQuery($tripId, $startStationId, $endStationId)
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
