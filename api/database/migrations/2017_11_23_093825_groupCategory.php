<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GroupCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gId',50)->nullable();
            $table->string('uId',50)->nullable();
            $table->string('pId',50)->nullable();
            $table->string('name',20)->nullable();
            $table->string('en',10)->nullable();
            $table->string('color',8)->nullable();
            $table->string('icon',20)->nullable();
            $table->integer('sort')->nullable();
            $table->integer('created_time')->nullable();
            $table->integer('updated_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_category');
    }
}
