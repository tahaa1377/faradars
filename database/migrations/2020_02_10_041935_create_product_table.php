<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->Increments('product_id');
            $table->string('title',255)->nullable();
            $table->enum('type' , ['programming', 'ai','computer science','robotic','data minig','electrical engineer','software engineer','wordpress','webmastering','control engineering'])->nullable();
            $table->string('imageUrl',255)->nullable();
            $table->integer('price')->nullable();
            $table->integer('time')->nullable();
            $table->text('brief')->nullable();
            $table->text('description')->nullable();
            $table->string('href',255)->nullable();
            $table->integer('teacher_id')->nullable();
            $table->timestamp('productOn')->default(\Illuminate\Support\Facades\DB::raw('CURRENT_TIMESTAMP'))->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');

    }
}
