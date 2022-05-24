<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediasNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medias_news', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('media_id')->unsigned();
            $table->string('description',500);
            $table->timestamps();
        });

        Schema::table('medias_news', function($table) {
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
        Schema::dropIfExists('media_news');
    }
}
