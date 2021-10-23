<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->string('price');
            $table->string('discount_price');
            $table->string('quantity');
            $table->text('desc');
            $table->string('color');
            $table->string('size');
            $table->string('video')->nullable();
            $table->string('image_1');
            $table->string('image_2');
            $table->string('image_3');
            $table->tinyInteger('main_slider')->nullable();
            $table->tinyInteger('mid_slider')->nullable();
            $table->tinyInteger('hot_deal')->nullable();
            $table->tinyInteger('hot_new')->nullable();
            $table->tinyInteger('best_rate')->nullable();
            $table->tinyInteger('trend')->nullable();
            $table->tinyInteger('status');

            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->bigInteger('subcategory_id')->unsigned()->nullable();
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');

            $table->bigInteger('brand_id')->unsigned()->nullable();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');

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
        Schema::dropIfExists('products');
    }
}
