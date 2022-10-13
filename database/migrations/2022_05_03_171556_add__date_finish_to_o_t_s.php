<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDateFinishToOTS extends Migration
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
            $table->datetime('DateFinish')->after('ObservationCancel')->nullable();
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
            $table->dropColumn('DateFinish');
        });
    }
}
