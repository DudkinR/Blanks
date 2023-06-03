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
        Schema::create('stamps', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade'); 
            $table->string('lang');
            $table->string('content');
            $table->timestamps();
        });
        Schema::create('blank_stamp', function (Blueprint $table) {
            $table->increments('id');
            //pivot table
            $table->integer('stamp_id')->unsigned();
            $table->foreign('stamp_id')->references('id')->on('stamps')->onDelete('cascade');            
            $table->integer('blank_id')->unsigned();
            $table->foreign('blank_id')->references('id')->on('blanks')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blank_stamp');
        Schema::dropIfExists('stamps');
        
    }
};
