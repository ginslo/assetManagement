<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVersionIdColumnToProductsTable extends Migration
{
      /**
       * Run the migrations.
       *
       * @return void
       */
      public function up()
      {
        Schema::table('products', function ($table) {
          $table->integer('version_id')->after('category_id');
        });
      }

      /**
       * Reverse the migrations.
       *
       * @return void
       */
      public function down()
      {
        Schema::table('products', function ($table) {
          $table->dropColumn('version_id');
        });
      }
}
