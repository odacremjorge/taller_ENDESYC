<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOTSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('o_t_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cost_center',10);
            $table->string('section', 50);
            $table->integer('mileage');
            $table->string('inventory', 3000)->nullable();
            $table->string('observation', 200)->nullable();
            $table->string('fuel', 100)->nullable();
            $table->string('condition', 100)->nullable();
            $table->string('job', 3000)->nullable();
            $table->string('manager', 100)->nullable();
            $table->bigInteger('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->bigInteger('operator_id')->unsigned();
            $table->foreign('operator_id')->references('id')->on('operators')->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('ot');
    }
}
