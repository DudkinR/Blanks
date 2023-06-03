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
        Schema::create('problem_blank', function (Blueprint $table) {
            $table->increments('id');
            //pivot table
            $table->integer('blank_id')->unsigned();
            $table->foreign('blank_id')->references('id')->on('blanks')->onDelete('cascade');
            $table->integer('problem_id')->unsigned();
            $table->foreign('problem_id')->references('id')->on('problems')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('problem_blank');
    }
};
