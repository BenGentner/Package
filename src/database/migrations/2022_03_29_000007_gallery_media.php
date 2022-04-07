<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GalleryMedia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * TODO:
         *  - still needed?
         */
        Schema::create('gallery_media', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('media_id')->references('id')->on('media');
            $table->foreignId('gallery_id')->references('id')->on('galleries');
            $table->unique(['media_id', 'gallery_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallery_media');
    }
}
