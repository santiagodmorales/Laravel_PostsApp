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
        Schema::create('comments', function (Blueprint $table) {
            $table->integerIncrements('comment_id');
            $table->unsignedTinyInteger('user_id')->nullable(false);
            $table->unsignedInteger('post_id')->nullable(false);
            $table->string('text', 255)->nullable(false);
            $table->timestamps();
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('post_id')->references('post_id')->on('posts');
            $table->boolean('deleted')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
