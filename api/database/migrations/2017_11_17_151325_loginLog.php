<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LoginLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('login_log', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lId',50)->nullable();
            $table->string('uId',50)->nullable();
            $table->string('loginname',20)->nullable();
            $table->string('key',20)->nullable();
            $table->integer('degree')->nullable();
            $table->string('ip',30)->nullable();
            $table->integer('time')->nullable();
            $table->string('platform',20)->nullable();
            $table->string('browser',16)->nullable();
            $table->string('address',50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('login_log');
    }
}
