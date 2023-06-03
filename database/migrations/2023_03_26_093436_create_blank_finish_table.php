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
        Schema::create('finish_conditions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->unsignedBigInteger('author_id');
            // foreign key
            $table->foreign('author_id')->references('id')->on('users');
            $table->string('lang')->nullable();
            $table->timestamps();

        });
        Schema::create('blank_finish', function (Blueprint $table) {
            $table->increments('id');
            //pivot table
            $table->integer('blank_id')->unsigned();
            $table->foreign('blank_id')->references('id')->on('blanks')->onDelete('cascade');
            $table->integer('condition_id')->unsigned();
            $table->foreign('condition_id')->references('id')->on('finish_conditions')->onDelete('cascade');
            $table->integer('order')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blank_finish');
        Schema::dropIfExists('finish_conditions');

    }
};
