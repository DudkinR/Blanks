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
        Schema::table('start_conditions', function (Blueprint $table) {
            //add column author_id after id
            $table->unsignedBigInteger('author_id')->after('id');
            // foreign key
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
        Schema::table('start_conditions', function (Blueprint $table) {
            //drop foreign key
            $table->dropForeign('start_conditions_author_id_foreign');
            //drop column
            $table->dropColumn('author_id');
        });
    }
};
