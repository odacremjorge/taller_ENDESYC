<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cia',10);
            $table->string('company', 100);
            $table->string('plate', 10);
            $table->string('type', 100)->nullable();
            $table->string('mark', 100)->nullable();
            $table->string('model', 100)->nullable();
            $table->integer('year')->nullable();
            $table->string('color', 100)->nullable();
            $table->string('displacement', 100)->nullable();
            $table->string('motor_type', 50)->nullable();
            $table->string('serie', 100)->nullable();
            $table->string('chassis', 100)->nullable();

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
        Schema::dropIfExists('vehicles');
    }
}
