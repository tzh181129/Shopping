<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->comment('店铺id');
            $table->integer('user_id')->comment('用户id');
            $table->string('shop_name')->comment('店铺名');
            $table->integer('product_id')->comment('商品id');
            $table->string('name')->comment('商品名');
            $table->string('price')->comment('商品价格');
            $table->string('discount')->comment('折扣价');
            $table->string('description')->comment('商品描述');
            $table->string('image')->comment('商品图像');
            $table->string('num')->comment('商品数量');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart');
    }
}
