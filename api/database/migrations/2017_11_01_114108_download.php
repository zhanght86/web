<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Download extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('download', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uId',50)->nullable();
            $table->string('downloadId',20)->nullable();
            $table->string('owener',20)->nullable();
            $table->integer('time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('download');
    }
}
