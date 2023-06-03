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
        Schema::table('blanks', function (Blueprint $table) {
            $table->string('lang')->after('author_id')->nullable();
        });
        Schema::table('positions', function (Blueprint $table) {
            $table->string('lang')->after('author_id')->nullable();
        });
        Schema::table('problems', function (Blueprint $table) {
            $table->string('lang')->after('author_id')->nullable();
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->string('lang')->after('author_id')->nullable();
        });
        Schema::table('rooms', function (Blueprint $table) {
            $table->string('lang')->after('author_id')->nullable();
        });
        Schema::table('start_conditions', function (Blueprint $table) {
            $table->string('lang')->after('author_id')->nullable();
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->string('lang')->after('author_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('lang');
        });
        Schema::table('start_conditions', function (Blueprint $table) {
            $table->dropColumn('lang');
        });
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropColumn('lang');
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('lang');
        });
        Schema::table('problems', function (Blueprint $table) {
            $table->dropColumn('lang');
        });
        Schema::table('positions', function (Blueprint $table) {
            $table->dropColumn('lang');
        });
        Schema::table('blanks', function (Blueprint $table) {
            $table->dropColumn('lang');
        });
    }
};
