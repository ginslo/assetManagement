<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('categories', function ($table) {
        $table->text('description')->after('name');
        $table->text('short_description')->after('description');
        $table->text('meta_title')->after('slug');
        $table->text('meta_keywords')->after('meta_title');
        $table->text('meta_description')->after('meta_keywords');
        $table->boolean('status')->default('1')->after('meta_description');
        $table->integer('searchable')->default('1')->after('status');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('categories', function ($table) {
        $table->dropColumn('description');
        $table->dropColumn('short_description');
        $table->dropColumn('meta_title');
        $table->dropColumn('meta_keywords');
        $table->dropColumn('meta_description');
        $table->dropColumn('status');
        $table->dropColumn('searchable');
      });
    }
}
