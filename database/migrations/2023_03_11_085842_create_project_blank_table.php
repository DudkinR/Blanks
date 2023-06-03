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
        Schema::create('project_blank', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order')->nullable();
            $table->integer('type')->nullable();
            //pivot table
            $table->unsignedBigInteger('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->integer('blank_id')->unsigned();
            $table->foreign('blank_id')->references('id')->on('blanks')->onDelete('cascade');
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
        Schema::dropIfExists('project_blank');
    }
};
