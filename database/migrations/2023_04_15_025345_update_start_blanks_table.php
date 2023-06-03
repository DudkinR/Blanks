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
            if (!Schema::hasColumn("blanks", "start")) {
                $table
                    ->integer("start")
                    ->default(100)
                    ->after("status");
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
        Schema::table('blanks', function (Blueprint $table) {
            if (Schema::hasColumn("blanks", "start")) {
                $table->dropColumn("start");
            }
        });
    }
};
