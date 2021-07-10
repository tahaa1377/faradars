<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video', function (Blueprint $table) {
            $table->Increments('video_id');
            $table->integer('product_id')->nullable();
            $table->integer('videoNumber')->nullable();
            $table->string('videoName',255)->nullable();
            $table->integer('videoTime')->nullable();
            $table->string('videoUrl',255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video');
    }
}
