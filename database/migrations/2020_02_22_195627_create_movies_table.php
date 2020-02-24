<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class   CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('popularity');
            $table->integer('vote_count');
            $table->string('genre_ids')->nullable();
            $table->boolean('video');
            $table->string('poster_path')->nullable();
            $table->boolean('adult');
            $table->string('original_language');
            $table->string('original_title');
            $table->string('title')->unique();
            $table->integer('vote_average');
            $table->longText('overview');
            $table->string('release_date');
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
        Schema::dropIfExists('movies');
    }
}
