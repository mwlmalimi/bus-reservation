<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('origin');
            $table->string('destination');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('bus_id');
            $table->date('departure_date');
            $table->string('departure_time');
            $table->bigInteger('fare');
            $table->string('status')->default('pending');
            $table->timestamps();
            // Setting foreign keys
            $table->foreign('company_id')->references('id')
                  ->on('companies')->onDelete('cascade')
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
