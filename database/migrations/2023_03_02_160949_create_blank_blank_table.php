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
        Schema::create('blank_blank', function (Blueprint $table) {
            $table->increments('id');
            //pivot table
            $table->integer('parent_id')->unsigned();
            $table->foreign('parent_id')->references('id')->on('blanks')->onDelete('cascade');            
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
        Schema::dropIfExists('blank_blank');
    }
};
