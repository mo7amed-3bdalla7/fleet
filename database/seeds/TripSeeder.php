<?php

use App\Bus;
use App\Station;
use App\Trip;
use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stations = Station::all();

        if ($stations->count() > 1) {
            $trip = Trip::create([
                'from' => $stations->first()->id,
                'to' => $stations->last()->id,
                'bus_id' => Bus::first()->id,
            ]);

            $trip->stations()->saveMany($stations);
        }
    }
}
