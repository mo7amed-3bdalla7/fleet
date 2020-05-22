<?php

use App\Station;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Station::insert([
            ['name' => 'Cairo', 'created_at' => Carbon::now()],
            ['name' => 'Giza', 'created_at' => Carbon::now()],
            ['name' => 'Al Fayyum', 'created_at' => Carbon::now()],
            ['name' => 'Al Minya', 'created_at' => Carbon::now()],
            ['name' => 'Asyut', 'created_at' => Carbon::now()],
        ]);
    }
}
