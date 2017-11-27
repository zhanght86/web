<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Project extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pId',50)->nullable();
            $table->string('uId',50)->nullable();
            $table->string('name',20)->nullable();
            $table->string('group',20)->nullable();
            $table->string('category',20)->nullable();
            $table->string('tag',50)->nullable();
            $table->string('cover',50)->nullable();
            $table->string('content',4000)->nullable();
            $table->string('file',50)->nullable();
            $table->string('preview',50)->nullable();
            $table->string('mode',15)->nullable();
            $table->string('author',50)->nullable();
            $table->integer('view')->nullable();
            $table->integer('thumb')->nullable();
            $table->integer('download')->nullable();
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
        Schema::dropIfExists('project');
    }
}
