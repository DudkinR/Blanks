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
        Schema::create('statblanks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('blank_id')->unsigned();
            $table->foreign('blank_id')->references('id')->on('blanks')->onDelete('cascade');   
            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->references('id')->on('users');
            $table->boolean('finish');
            $table->integer('dificult');
            $table->integer('useful');
            $table->integer('full');
            $table->integer('understand');
            $table->integer('detail');
            $table->integer('potential_ideas');
            $table->integer('timer');
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
        Schema::dropIfExists('statblanks');
    }
};
