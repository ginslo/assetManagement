<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameDistributionVersionIdColumnToVersionIdServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('servers', function ($table) {
        $table->renameColumn('distribution_version_id', 'version_id');
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
        $table->renameColumn('version_id', 'distribution_version_id');
      });
    }
}
