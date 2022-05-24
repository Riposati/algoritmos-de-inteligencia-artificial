<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDenunciationsPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denunciations_photos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('medias_photos_id')->unsigned();
            $table->string('reason', 500);
            $table->timestamps();
        });

        Schema::table('denunciations_photos', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('medias_photos_id')->references('id')->on('commentaries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('denunciations_photos');
    }
}
