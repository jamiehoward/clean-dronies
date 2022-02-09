<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopDroniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_dronies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dronie_id');
            $table->foreign('dronie_id')->references('id')->on('dronies')->onDelete('cascade');
            $table->float('clean_score')->default(0);
            $table->integer('total_votes')->default(0);
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
        Schema::dropIfExists('top_dronies');
    }
}
