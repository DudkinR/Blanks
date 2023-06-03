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
        Schema::create('country', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('enabled')->default(1)->comment('Use this country in applications');
            $table->string('code3l', 3)->unique()->comment('ISO 3166-1 alpha-3 three-letter code');
            $table->string('code2l', 2)->unique()->comment('ISO 3166-1 alpha-2 two-letter code');
            $table->string('name', 64)->unique()->comment('Name of the country in English');
            $table->string('name_official', 128)->nullable();
            $table->decimal('latitude')->nullable();
            $table->decimal('longitude')->nullable();
            $table->tinyInteger('zoom')->comment('Optimal zoom when showing country on map');
            $table->tinyInteger('un')->comment('Shengen has');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('country');
    }
};
