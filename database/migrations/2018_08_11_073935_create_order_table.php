<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *订单
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id')->comment('自增id');
            $table->integer('user_id')->comment('用户id');
            $table->integer('shop_id')->comment('店铺id');
            $table->integer('product_id')->comment('商品id');
            $table->string('user_name')->comment('收货人');
            $table->string('user_phone')->comment('收货人号码');
            $table->string('user_address')->comment('收货地址');
            $table->string('address')->comment('商品所在地');
            $table->string('shop_name')->comment('商品店铺名');
            $table->string('price')->comment('商品单价');
            $table->string('discount')->comment('折扣价');
            $table->string('total')->comment('总价');
            $table->string('color')->comment('商品颜色');
            $table->string('image')->comment('商品图像');
            $table->string('num')->comment('商品数量');
            $table->string('name')->comment('商品名');
            $table->string('title')->comment('商品标题');
            $table->string('order_number')->comment('订单编号');
            $table->string('create_time')->comment('创建时间');
            $table->string('delivery_time')->comment('发货时间');
            $table->string('finish_time')->comment('订单完成时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
