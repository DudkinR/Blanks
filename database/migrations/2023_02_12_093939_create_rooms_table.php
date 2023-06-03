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
        Schema::create('rooms', function (Blueprint $table) {
            //autoincrement id
            $table->increments('id');
            //name
            $table->string('name');
            //description
            $table->text('description');
            // high string
            $table->float('high', 8, 2);
            // squeare
            $table->float('squeare', 8, 2);
            // responsible person
            $table->integer('responsible_person');
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
        Schema::dropIfExists('rooms');
    }
};
