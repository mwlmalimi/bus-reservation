<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookedBusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booked_buses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('route_id');
            $table->unsignedBigInteger('bus_id');
            $table->text('seats_not_taken');
            $table->string('departure_time');
            $table->string('status');
            $table->timestamps();
            // Setting foreign keys
            $table->foreign('route_id')->references('id')
                  ->on('routes')->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('bus_id')->references('id')
                  ->on('buses')->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booked_buses');
    }
}
