<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *商品
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->comment('自增id');
            $table->integer('shop_id')->comment('店铺id');
            $table->integer('user_id')->comment('用户id');
            $table->string('shop_name')->comment('店铺名');
            $table->string('name')->comment('商品名');
            $table->string('title')->comment('商品标题');
            $table->string('price')->comment('商品价格');
            $table->string('discount')->comment('折扣价');
            $table->string('description')->comment('商品描述');
            $table->string('address')->comment('商品所在地');
            $table->string('color')->comment('商品颜色');
            $table->string('product_type')->comment('商品分类');
            $table->string('image')->comment('商品图像');
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
