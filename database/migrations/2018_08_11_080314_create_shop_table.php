<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopTable extends Migration
{
    /**
     * Run the migrations.
     *商品店铺
     * @return void
     */
    public function up()
    {
        Schema::create('shop', function (Blueprint $table) {
            $table->increments('id')->comment('自增id');
            $table->integer('user_id')->comment('用户id');
            $table->string('shop_name')->comment('店铺名');
            $table->string('register_name')->comment('掌柜名');
            $table->string('shop_details')->comment('店铺详情');
            $table->string('shop_image')->comment('店铺头像');
            $table->string('shop_advert')->comment('店铺广告');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop');
    }
}
