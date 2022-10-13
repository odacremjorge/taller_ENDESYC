<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_entries', function (Blueprint $table) {
            $table->unsignedBigInteger('record_id');
            $table->unsignedBigInteger('ot_id');
            $table->foreign('record_id')->references('id')->on('records')->onDelete('cascade');
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
        Schema::dropIfExists('ot_entries');
    }
}
