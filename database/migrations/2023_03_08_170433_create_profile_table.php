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
        Schema::create('profile', function (Blueprint $table) {
          //user_id as id of user primary key
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // money double
            $table->double('money')->default(0);
            // image
            $table->string('image')->nullable();
            // size of font
            $table->integer('size')->default(14);
            // color of font
            $table->string('color')->default('#000000');
            // color of background
            $table->string('background')->default('#ffffff');
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
        Schema::dropIfExists('profile');
    }
};
