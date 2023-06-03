<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // add column popular to table statblanks after column detail
        Schema::table("statblanks", function (Blueprint $table) {
            $table
                ->integer("popular")
                ->after("detail")
                ->default(100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //drop column popular from table statblanks
        Schema::table("statblanks", function (Blueprint $table) {
            $table->dropColumn("popular");
        });
    }
};
