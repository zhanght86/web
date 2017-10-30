<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Category extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uId',50)->nullable();
            $table->string('text',20)->nullable();
            $table->string('parent',20)->nullable();
            $table->string('tag',16)->nullable();
            $table->string('letter',2)->nullable();
            $table->string('icon',20)->nullable();
            $table->string('color',7)->nullable();
            $table->string('url',30)->nullable();
            $table->string('author',20)->nullable();
            $table->integer('sort')->nullable();
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
        Schema::dropIfExists('category');
    }
}
