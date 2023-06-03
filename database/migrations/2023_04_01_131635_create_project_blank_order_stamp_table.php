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
        if (Schema::hasTable("project_blank_order_stamp")) {
            Schema::dropIfExists("project_blank_order_stamp");
        }
        Schema::create("project_blank_order_stamp", function (
            Blueprint $table
        ) {
            $table->increments("id");
            $table->foreignId("project_id")->constrained();
            $table->unsignedBigInteger("blank_id")->constrained();
            $table->integer("order");
            $table->unsignedBigInteger("stamp_id")->constrained();
            $table
                ->unsignedBigInteger("new_stamp_id")

                ->constrained("stamps");
            $table->unique(
                ["project_id", "blank_id", "order", "stamp_id"],
                "pbos_project_blank_order_stamp_unique"
            );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("project_blank_order_stamp");
    }
};
