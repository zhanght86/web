<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Theme extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theme', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tId',50)->nullable();
            $table->string('uId',50)->nullable();
            $table->string('color', 8)->nullable();
            $table->string('name', 10)->nullable();
            $table->integer('created_time')->nullable();
            $table->integer('update_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('theme');
    }
}
