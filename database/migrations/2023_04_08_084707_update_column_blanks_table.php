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
        Schema::table("blanks", function (Blueprint $table) {
            // add column to table description text  after  name
            $table->text("description")->after("name");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("blanks", function (Blueprint $table) {
            //

            $table->dropColumn("description");
        });
    }
};
