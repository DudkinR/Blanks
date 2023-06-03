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
        Schema::create('blanks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('tcheme');
            //General error: 3780 Referencing column 'author_id' and referenced column 'id' in foreign key constraint 'blanks_author_id_foreign'
            $table->integer('author_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blanks');
    }
};
