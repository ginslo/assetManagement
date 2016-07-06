<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('servers', function ($table) {
        $table->string('bugtracker_name', 48)->nullable()->after('cost');
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
        $table->dropColumn('bugtracker_name');
      });
    }
}
