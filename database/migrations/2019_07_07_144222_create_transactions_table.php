<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('transactions', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('transaction_code');
          $table->unsignedBigInteger('passenger_id')->nullable();
          $table->string('reference_number');
          $table->bigInteger('amount');
          $table->timestamps();
          // foreign key
          $table->foreign('passenger_id')->references('id')
                ->on('passengers')->onDelete('cascade')
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
        Schema::dropIfExists('transactions');
    }
}
