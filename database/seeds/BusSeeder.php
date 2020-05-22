<?php

use App\Bus;
use App\Seat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bus = Bus::create([
            'id' => Str::random(5)
        ]);

        for ($i = 1; $i < 13; ++$i) {
            Seat::create([
                'code' => $i,
                'bus_id' => $bus->id
            ]);
        }
    }
}
