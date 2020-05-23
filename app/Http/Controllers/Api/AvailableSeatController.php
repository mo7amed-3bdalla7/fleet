<?php

namespace App\Http\Controllers\Api;

use App\Availability;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Resources\AvailabilityResource;
use App\Trip;
use Illuminate\Http\Request;

class AvailableSeatController extends Controller
{
    public function show(Trip $trip, StoreBookingRequest $request)
    {
        $availabilities = Availability::availableSeats($trip->id, $request->start, $request->end);

        return AvailabilityResource::collection($availabilities);
    }
}
