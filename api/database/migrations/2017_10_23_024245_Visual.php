<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Visual extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::defaultStringLength(191);
        Schema::create('visual', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uId',50)->nullable();
            $table->string('name',50)->nullable();
            $table->string('category',16)->nullable();
            $table->string('author',10)->nullable();
            $table->string('pic',100)->nullable();
            $table->text('content',300)->nullable();
            $table->string('package',100)->nullable();
            $table->string('ext',10)->nullable();
            $table->integer('size')->nullable();
            $table->string('tag',40)->nullable();
            $table->string('thumb',5)->nullable();
            $table->string('view',5)->nullable();
            $table->integer('created_time')->time();
            $table->integer('updated_time')->time();
            // $table->rememberToken();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visual');
    }
}
