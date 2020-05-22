<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationTripTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('station_trip', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('station_id');
            $table->unsignedBigInteger('trip_id');

            $table->foreign('station_id')
                ->references('id')
                ->on('stations');

            $table->foreign('trip_id')
                ->references('id')
                ->on('trips');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('station_trip');
    }
}
