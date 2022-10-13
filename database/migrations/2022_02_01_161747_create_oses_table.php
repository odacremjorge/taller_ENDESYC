<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('workshop', 100);
            $table->integer('price_ose')->nullable();
            $table->string('jobOSE', 3000)->nullable();
            $table->datetime('DateOSE');
            $table->bigInteger('ot_id')->unsigned();
            $table->foreign('ot_id')->references('id')->on('o_t_s')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oses');
    }
}
