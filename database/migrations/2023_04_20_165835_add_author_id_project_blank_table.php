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
        Schema::table("project_blank", function (Blueprint $table) {
            $table->unsignedBigInteger('author_id')->after('type');
            // foreign key
          //  $table->foreign('author_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    { 
        Schema::table("project_blank", function (Blueprint $table) {
        $table->dropColumn('author_id');
         });
    }
};
