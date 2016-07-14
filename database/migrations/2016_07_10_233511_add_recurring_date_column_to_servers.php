<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRecurringDateColumnToServers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('servers', function ($table) {
        $table->dateTime('recurring_start_date')->default('0000-00-00 00:00:00')->after('period_id');
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
        $table->dropColumn('recurring_start_date');
      });
    }
}
