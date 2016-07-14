<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('servers', function ($table) {
        $table->boolean('recurring')->default('1')->after('cost');
        $table->integer('period_id')->default('1')->after('recurring');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('servers', function ($table) {
        $table->dropColumn('recurring');
        $table->dropColumn('period_id');
      });
    }
}
