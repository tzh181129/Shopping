<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionTable extends Migration
{
    /**
     * Run the migrations.
     *收藏
     * @return void
     */
    public function up()
    {
        Schema::create('collection', function (Blueprint $table) {
            $table->increments('id')->comment('自增id');
            $table->integer('user_id')->comment('用户id');
            $table->integer('shop_id')->comment('店铺id');
            $table->integer('product_id')->comment('商品id');
            $table->string('name')->comment('商品名');
            $table->string('price')->comment('商品价格');
            $table->string('discount')->comment('商品折扣价');
            $table->string('title')->comment('商品标题');
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
        Schema::dropIfExists('collection');
    }
}
