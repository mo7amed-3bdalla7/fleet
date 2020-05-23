<?php

namespace App\Http\Controllers\Api;

use App\Availability;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Resources\SeatResource;
use App\Trip;

class AvailableSeatController extends Controller
{
    public function show(Trip $trip, StoreBookingRequest $request)
    {
        $seats = Availability::availableSeats($trip->id, $request->start, $request->end);

        return SeatResource::collection($seats);
    }
}
