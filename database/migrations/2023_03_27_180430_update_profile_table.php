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
        Schema::table("profile", function (Blueprint $table) {
            //add col sex
            // если не существует колонка
            if (!Schema::hasColumn("profile", "sex")) {
            $table
                ->string("sex")
                ->default("man")
                ->after("lang");
            }
            // boolean switchof or on help
            if (!Schema::hasColumn("profile", "help")) {
            $table
                ->boolean("help")
                ->default(false)
                ->after("lang");
            }
            if (!Schema::hasColumn("profile", "lang")) {
            // time in system
            $table
                ->integer("time")
                ->default(0)
                ->after("lang");
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("profile", function (Blueprint $table) {
            //drop cols
            $table->dropColumn("sex");
            $table->dropColumn("help");
            $table->dropColumn("time");
        });
    }
};
