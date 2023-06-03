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
        if (!Schema::hasTable("ideas")) {
            Schema::create("ideas", function (Blueprint $table) {
                $table->increments("id");
                $table->text("content");
                $table->unsignedBigInteger("author_id");
                $table->unsignedBigInteger("category");
                $table->Integer("status");
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable("ideas")) {
            Schema::dropIfExists("ideas");
        }
    }
};
