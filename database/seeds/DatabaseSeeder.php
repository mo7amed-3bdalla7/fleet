<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StationSeeder::class);
        $this->call(BusSeeder::class);
        $this->call(TripSeeder::class);
        $this->call(RouteSeeder::class);
    }
}
