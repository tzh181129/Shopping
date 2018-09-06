<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *商家或用户
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('register_name')->comment('用户名');
            $table->string('register_image')->comment('用户头像');
            $table->string('register_email')->comment('用户邮箱');
            $table->string('business')->comment('用户商家是否');
            $table->string('register_phone')->comment('用户电话号码');
            $table->string('register_pwd')->comment('用户密码');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
