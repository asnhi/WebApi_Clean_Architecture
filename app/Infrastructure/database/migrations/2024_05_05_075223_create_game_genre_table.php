<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameGenreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_genre', function (Blueprint $table) {
            $table->id();
            $table->Integer('genre_id')->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade')->default(1);
            $table->Integer('game_id')->foreign('game_id')->references('id')->on('games')->onDelete('cascade')->default(1);
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
        Schema::dropIfExists('game_genre');
    }
}
