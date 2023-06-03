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
        Schema::table('profile', function (Blueprint $table) {
              $table->boolean('lpanel')->default(1);
              $table->boolean('rpanel')->default(1);
              $table->boolean('bpanel')->default(1);
              $table->boolean('tpanel')->default(1);
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profile', function (Blueprint $table) {
            $table->dropColumn('lpanel');
            $table->dropColumn('rlpanel');
            $table->dropColumn('bpanel');
            $table->dropColumn('tpanel');
        });
    }
};
