<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropVersionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('versions');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::create('versions', function(Blueprint $table)
      {
        $table->increments('id');
        $table->string('name')->unique('os_versions_name_unique');
        $table->integer('distribution_id');
        $table->integer('product_id');
        $table->timestamps();
      });
    }
}
