<?php

namespace App\Http\Controllers\Api;

use App\Availability;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookingRequest;
use App\Route;
use App\StationTrip;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use function Illuminate\Support\Facades\Response;

class BookSeatController extends Controller
{
    public function store(StoreBookingRequest $request)
    {

        $route = Route::where('from', $request->start)
            ->where('to', $request->end)
            ->first();

        $seat = Availability::bestAvailableSeat($route->trip_id, $request->start, $request->end);

        if ($seat) {
            try {
                DB::beginTransaction();

                $route->syncSeatsAvailability($seat->id);
                $ticket = Ticket::create([
                    'route_id' => $route->id,
                    'seat_id' => $seat->id,
                ]);

                DB::commit();

                return \response()->json([
                    'msg' => 'Booked Successfully',
                    'ticket' => $ticket,
                ]);
            } catch (\Exception $e) {
                DB::rollBack();
            }
        }

        return \response()->json(['msg' => 'There is no ticket available'], 404);
    }
}
