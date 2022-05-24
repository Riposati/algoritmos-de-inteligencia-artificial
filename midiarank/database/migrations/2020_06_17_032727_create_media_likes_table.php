<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_likes', function (Blueprint $table) {
            $table->id();
            $table->boolean('like');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('media_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('media_likes', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('media_id')->references('id')->on('medias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media_likes');
    }
}
