<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->boolean('published')->default(true);
            $table->string('url');
            $table->string('thumbnail')->nullable();
            $table->boolean('allow_comments')->default(true);
            $table->integer('views')->default(0);
            $table->unsignedInteger('channel_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('channel_id')->references('id')->on('channels')
                ->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
