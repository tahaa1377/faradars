<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type', function (Blueprint $table) {
            $table->Increments('type_id');
            $table->enum('ttype' , ['programming', 'ai','computer science','robotic','data minig','electrical engineer','software engineer','wordpress','webmastering','control engineering'])->nullable();
            $table->string('hreff')->nullable();
            $table->string('hrefImage')->nullable();
            $table->text('desc')->nullable();
            $table->string('typeImage')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type');
    }
}
