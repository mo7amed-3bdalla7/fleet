<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvailabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('availabilities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trip_id');
            $table->unsignedSmallInteger('station_id')->default(0);
            $table->unsignedBigInteger('seat_id');
            $table->timestamps();

            $table->foreign('trip_id')
                ->references('id')
                ->on('trips');

            $table->foreign('seat_id')
                ->references('id')
                ->on('seats');

            $table->unique(['trip_id', 'station_id', 'seat_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('availabilities');
    }
}
