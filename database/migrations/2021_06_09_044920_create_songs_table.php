<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('slug');
            $table->date('release_date');
            $table->string('cover_art')->nullable();
            $table->string('bandcamp_slug')->nullable();
            $table->string('soundcloud_slug')->nullable();
            $table->string('soundcloud_param')->nullable();
            $table->string('youtube_id')->nullable();
            $table->text('description');
            $table->boolean('is_single')->default(false);
            $table->boolean('epk_published')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs');
    }
}
