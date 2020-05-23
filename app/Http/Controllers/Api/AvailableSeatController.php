<?php

namespace App\Http\Controllers\Api;

use App\Availability;
use App\Http\Controllers\Controller;
use App\Http\Resources\AvailabilityResource;
use App\Trip;
use Illuminate\Http\Request;

class AvailableSeatController extends Controller
{
    public function show(Trip $trip, Request $request)
    {
        $this->validate($request, [
            'start' => 'required|exists:stations,id',
            'end' => 'required|exists:stations,id',
        ]);

        $availabilities = Availability::distinct()
            ->whereNotBetween('station_id', [
                $request->start,
                $request->end,
            ])
            ->whereHas('seat')
            ->with('seat')
            ->get('seat_id');

        return AvailabilityResource::collection($availabilities);
    }
}
