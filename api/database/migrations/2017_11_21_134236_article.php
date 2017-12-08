<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Article extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->increments('id');
            $table->string('aId',50)->nullable();
            $table->string('title',40)->nullable();
            $table->string('category',30)->nullable();
            $table->string('tags',50)->nullable();
            $table->string('editor',10)->nullable();
            $table->string('summary',120)->nullable();
            $table->string('cover',50)->nullable();
            $table->string('author',16)->nullable();
            $table->integer('publish')->nullable();
            $table->integer('recommend')->nullable();
            $table->integer('fine')->nullable();
            $table->longText('description', 5000)->nullable();
            $table->longText('md')->nullable();
            $table->integer('original')->nullable();
            $table->string('originallink', 50)->nullable();
            $table->integer('created_time')->nullable();
            $table->integer('updated_time')->nullable();
            $table->integer('view')->nullable();
            $table->integer('thumb')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article');
    }
}
