<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReplacementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replacements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('amount');
            $table->string('unit', 30);
            $table->string('description', 100);
            $table->string('codigo', 30);
            $table->integer('price_replacement')->nullable();
            $table->integer('num_replacement')->nullable();
            $table->bigInteger('operator_id')->unsigned();
            $table->foreign('operator_id')->references('id')->on('operators')->onDelete('cascade');
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
        Schema::dropIfExists('replacements');
    }
}
