<?php

use App\Ticket;
use App\Trip;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trip = Trip::first();
        $route = $trip->routes()->first();
        $seat = $trip->bus->seats()->first();
        $route->syncSeatsAvailability($seat->id);

        Ticket::create([
            'route_id' => $route->id,
            'seat_id' => $seat->id
        ]);
    }
}
