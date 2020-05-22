<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('from');
            $table->unsignedSmallInteger('to');
            $table->string('bus_id');
            $table->timestamps();

            $table->foreign('from')
                ->references('id')
                ->on('stations');

            $table->foreign('to')
                ->references('id')
                ->on('stations');

            $table->foreign('bus_id')
                ->references('id')
                ->on('buses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips');
    }
}
