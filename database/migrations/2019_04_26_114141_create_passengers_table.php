<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePassengersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('passengers', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('first_name');
        $table->string('last_name');
        $table->string('phone_number');
        $table->string('email');
        $table->string('seats_taken');
        $table->unsignedBigInteger('schedule_id')->nullable();
        $table->timestamps();
        //foreign key
        $table->foreign('schedule_id')->references('id')
              ->on('schedules')->onDelete('set null');
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
        Schema::dropIfExists('passengers');
    }
}
