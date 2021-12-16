<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigInteger('user_id')->nullable();
            $table->string('payment_type',255)->nullable();
            $table->string('payment_id',255)->nullable();
            $table->string('paying_amount')->nullable();
            $table->string('balance_transaction')->nullable();
            $table->string('strip_order_id')->nullable();
            $table->string('subtotal')->nullable();
            $table->string('total')->nullable();
            $table->string('shipping')->nullable();
            $table->string('vat')->nullable();
            $table->string('status')->nullable()->default(0);
            $table->string('month')->nullable();
            $table->string('day')->nullable();
            $table->string('year')->nullable();
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
