<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('products', function ($table) {
        $table->string('sku', 24)->after('source_url');
        $table->text('meta_title')->after('sku');
        $table->text('meta_keywords')->after('meta_title');
        $table->text('meta_description')->after('meta_keywords');
        $table->boolean('status')->default('1')->after('meta_description');
        $table->integer('searchable')->default('1')->after('status');
        $table->decimal('cost', 5,2)->default('0.00')->after('searchable');
        $table->decimal('price', 5,2)->default('0.00')->after('cost');
        $table->boolean('recurring')->default('0')->after('price');
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
        $table->dropColumn('sku');
        $table->dropColumn('meta_title');
        $table->dropColumn('meta_keywords');
        $table->dropColumn('meta_description');
        $table->dropColumn('status');
        $table->dropColumn('searchable');
        $table->dropColumn('cost');
        $table->dropColumn('price');
        $table->dropColumn('recurring');
      });
    }
}
