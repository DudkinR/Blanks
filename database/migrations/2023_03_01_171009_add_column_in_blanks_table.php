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
        Schema::table('categories', function (Blueprint $table) {
            //add column author_id after id
            $table->unsignedBigInteger('author_id')->after('id');
            // author_id make = 1 
            


            //add foreign key
            $table->foreign('author_id')->references('id')->on('users');
        });

        // add column author_id to items table
        Schema::table('items', function (Blueprint $table) {
            $table->unsignedBigInteger('author_id')->after('id');
            $table->foreign('author_id')->references('id')->on('users');
        });
        // add column author_id to positions table
        Schema::table('positions', function (Blueprint $table) {
            $table->unsignedBigInteger('author_id')->after('id');
            $table->foreign('author_id')->references('id')->on('users');
        });
        // problems
        // add column author_id to problems table
        Schema::table('problems', function (Blueprint $table) {
            $table->unsignedBigInteger('author_id')->after('id');
            $table->foreign('author_id')->references('id')->on('users');
        });
        // projects
        // add column author_id to projects table
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedBigInteger('author_id')->after('id');
            $table->foreign('author_id')->references('id')->on('users');
        });
        //rooms
        // add column author_id to rooms table
        Schema::table('rooms', function (Blueprint $table) {
            $table->unsignedBigInteger('author_id')->after('id');
            $table->foreign('author_id')->references('id')->on('users');
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
            // drop foreign key
            $table->dropForeign('categories_author_id_foreign');
            // drop column
            $table->dropColumn('author_id');
        });
        Schema::table('items', function (Blueprint $table) {
            $table->dropForeign('items_author_id_foreign');
            $table->dropColumn('author_id');
        });
        Schema::table('positions', function (Blueprint $table) {
            $table->dropForeign('positions_author_id_foreign');
            $table->dropColumn('author_id');
        });
        Schema::table('problems', function (Blueprint $table) {
            $table->dropForeign('problems_author_id_foreign');
            $table->dropColumn('author_id');
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign('projects_author_id_foreign');
            $table->dropColumn('author_id');
        });
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropForeign('rooms_author_id_foreign');
            $table->dropColumn('author_id');
        });
    }
};
