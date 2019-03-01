<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', '56')->nullable('true')->comment('用户昵称');
            $table->string('name', '56')->nullable(true)->comment('用户姓名');
            $table->integer('phone')->nullable(true)->comment('电话');
            $table->string('avatar_url', '255')->nullable(true)->comment('用户头像');
            $table->string('address', '255')->nullable(true)->comment('用户地址');
            $table->string('password', '56')->nullable(true)->comment('用户密码');
            $table->timestamps();
        });

        //表备注
        DB::statement("ALTER TABLE `users` COMMENT '用户表';");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
