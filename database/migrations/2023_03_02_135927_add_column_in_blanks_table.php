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
            $table->Integer('status')->after('author_id');
        });

        Schema::table('positions', function (Blueprint $table) {
            $table->Integer('status')->after('author_id');
        });
        Schema::table('problems', function (Blueprint $table) {
            $table->Integer('status')->after('author_id');
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->Integer('status')->after('author_id');
        });
        Schema::table('rooms', function (Blueprint $table) {
            $table->Integer('status')->after('author_id');
        });
        Schema::table('start_conditions', function (Blueprint $table) {
            $table->Integer('status')->after('author_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blanks', function (Blueprint $table) {
            $table->dropColumn('status');
        });
        Schema::table('positions', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('problems', function (Blueprint $table) {
            $table->dropColumn('status');
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('status');
        });
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropColumn('status');
        });
        Schema::table('start_conditions', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
