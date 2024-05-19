<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->Integer('order_id')->foreign('order_id')->references('id')->on('orders')->onDelete('cascade')->default(1);
            $table->Integer('game_id')->foreign('game_id')->references('id')->on('games')->onDelete('cascade')->default(1);;
            $table->Integer('quantity')->nullable(false);
            $table->double('price')->nullable(false);
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
        Schema::dropIfExists('order_details');
    }
}
