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

        Ticket::create([
            'route_id' => $trip->routes()->first()->id,
            'seat_id' => $trip->bus->seats()->first()->id
        ]);
    }
}
