<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediasPlatformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medias_platforms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('media_id')->unsigned();
            $table->string('name',500);
            $table->timestamps();
        });

        Schema::table('medias_platforms', function($table) {
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
        Schema::dropIfExists('medias_platforms');
    }
}
