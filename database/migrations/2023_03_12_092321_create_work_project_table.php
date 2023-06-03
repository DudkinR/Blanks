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
        Schema::create('work_project', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order')->default(0);
            $table->unsignedBigInteger('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->integer('blank_id')->unsigned();
            $table->foreign('blank_id')->references('id')->on('blanks')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
         //   $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->integer('type')->default(0);
            
            $table->integer('item_id')->unsigned();
          //$table->foreignId('item_id')->constrained('items')->onDelete('cascade');
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
        Schema::dropIfExists('work_project');
    }
};
