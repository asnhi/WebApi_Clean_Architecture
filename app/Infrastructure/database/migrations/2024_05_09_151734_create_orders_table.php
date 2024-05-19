<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Domain\Entities\Order;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->Integer('user_id')->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->default(1);
            $table->double('total')->nullable(false);
            $table->enum('order_status', Order::ORDER_STATUS)->default(Order::ORDER_STATUS[0]);
            $table->enum('pay_type', Order::PAY_TYPE);
            $table->string('order_id_ref')->nullable(false);
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
        Schema::dropIfExists('orders');
    }
}
