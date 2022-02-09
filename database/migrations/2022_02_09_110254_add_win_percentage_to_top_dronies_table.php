<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWinPercentageToTopDroniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('top_dronies', function (Blueprint $table) {
            $table->float('win_percentage')->default(0)->after('total_votes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('top_dronies', function (Blueprint $table) {
            $table->dropColumn('win_percentage');
        });
    }
}
