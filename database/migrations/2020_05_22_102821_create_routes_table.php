<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('from');
            $table->unsignedSmallInteger('to');
            $table->unsignedBigInteger('trip_id');
            $table->unsignedInteger('price');
            $table->timestamps();


            $table->foreign('from')
                ->references('id')
                ->on('stations');

            $table->foreign('to')
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
        Schema::dropIfExists('routes');
    }
}
