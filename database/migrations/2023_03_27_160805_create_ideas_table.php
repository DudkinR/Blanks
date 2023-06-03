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
        // если не существует таблица ideas, то создать её
        if (!Schema::hasTable("ideas")) {
            Schema::create("ideas", function (Blueprint $table) {
                //increments
                $table->increments("id");
                // content
                $table->text("content");
                // author_id
                $table->integer("author_id");
                // category
                $table->integer("category");
                // status
                $table->integer("status");
                // created_at
                $table->timestamp("created_at")->useCurrent();
                // updated_at
                $table->timestamp("updated_at")->useCurrent();
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
        // drop table shema
        Schema::dropIfExists("ideas");
    }
};
