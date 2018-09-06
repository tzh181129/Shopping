<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluateTable extends Migration
{
    /**
     * Run the migrations.
     *评价
     * @return void
     */
    public function up()
    {
        Schema::create('evaluate', function (Blueprint $table) {
            $table->increments('id')->comment('自增id');
            $table->integer('product_id')->comment('商品id');
            $table->integer('user_id')->comment('用户id');
            $table->string('register_name')->comment('评价名');
            $table->string('name')->comment('商品名');
            $table->string('image')->comment('商品图像');
            $table->string('color')->comment('商品颜色');
            $table->string('evaluate_text')->comment('评价内容');
            $table->string('evaluate_grade')->comment('评价等级');
            $table->string('evaluate_time')->comment('评价时间');
            $table->string('review_text')->comment('追评内容');
            $table->string('review_time')->comment('追评时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluate');
    }
}
