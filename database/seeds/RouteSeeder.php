<?php

use App\Route;
use App\Trip;
use Illuminate\Database\Seeder;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trip::all()->each(function ($trip) {
            $trip->generateRoutes();
        });
    }
}
