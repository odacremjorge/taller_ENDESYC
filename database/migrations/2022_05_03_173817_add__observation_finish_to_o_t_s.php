<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddObservationFinishToOTS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('o_t_s', function (Blueprint $table) {
            //
            $table->string('ObservationFinish', 500)->after('TimeFinish')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('o_t_s', function (Blueprint $table) {
            //
            $table->dropColumn('ObservationFinish');
        });
    }
}
