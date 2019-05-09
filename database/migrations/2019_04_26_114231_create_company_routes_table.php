s<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_routes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('route_id');
            $table->bigInteger('fare');
            $table->timestamps();

            // Setting foreign keys
            $table->foreign('company_id')->references('id')
                  ->on('companies')->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('route_id')->references('id')
                  ->on('routes')->onDelete('cascade')
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
        Schema::dropIfExists('company_routes');
    }
}
