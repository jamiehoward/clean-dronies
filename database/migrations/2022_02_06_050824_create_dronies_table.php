<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDroniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dronies', function (Blueprint $table) {
            $table->id();
            $table->string("nft_id");
            $table->string("token_hash");
            $table->string("url");
            $table->string("token_link");
            $table->string("image");
            $table->integer("rank");
            $table->integer("score");
            $table->tinyInteger("attribute_count");
            $table->string("color");
            $table->string("background");
            $table->string("back_storage");
            $table->string("body");
            $table->string("body_texture");
            $table->string("chest_accessory");
            $table->string("head");
            $table->string("eyes");
            $table->string("mask");
            $table->string("beak");
            $table->string("hat");
            $table->string("wings");
            $table->string("elite_prototype");
            $table->string("sale_link")->nullable();
            $table->string("sale_price")->nullable();
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
        Schema::dropIfExists('dronies');
    }
}
