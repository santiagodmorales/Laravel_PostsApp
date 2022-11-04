<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->integerIncrements('image_id');
            $table->unsignedInteger('comment_id')->nullable(false);
            $table->unsignedInteger('post_id')->nullable(false);
            $table->string('filename');
            $table->string('path', 100)-> nulleable(false);
            $table->timestamps();
            $table->foreign('comment_id')->references('comment_id')->on('comments');
            //$table->foreign('post_id')->references('post_id')->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
};
