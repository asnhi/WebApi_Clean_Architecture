<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keys', function (Blueprint $table) {
            $table->id();
            $table->string('cd_key')->nullable()->default(null);
            $table->Integer('game_id')->foreign('game_id')->references('id')->on('games')->onDelete('cascade')->default(1);
            $table->boolean('is_redeemed')->default(0);
            $table->boolean('is_expired')->default(0);
            $table->dateTime('expire_date')->nullable(true);
            $table->unique(['cd_key', 'game_id']);
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
        Schema::dropIfExists('keys');
    }
}
