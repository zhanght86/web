<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uId',50)->nullable();
            $table->string('username',20)->nullable();
            $table->string('name',20)->nullable();
            $table->string('password',30)->nullable();
            $table->string('QQ',16)->nullable();
            $table->string('wechat',16)->nullable();
            $table->string('phone',16)->nullable();
            $table->string('email',16)->nullable();
            $table->string('sex',4)->nullable();
            $table->string('depart',16)->nullable();
            $table->string('face', 30)->nullable();
            $table->string('identity',16)->nullable();
            $table->integer('status')->nullable();
            $table->integer('created_time')->time();
            $table->integer('updated_time')->time();
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
