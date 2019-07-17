<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookedSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booked_schedules', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('schedule_id');
          $table->text('seats_taken');
          $table->timestamps();
          // Setting foreign keys
          $table->foreign('schedule_id')->references('id')
                ->on('schedules')->onDelete('cascade')
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
        Schema::dropIfExists('booked_schedules');
    }
}
