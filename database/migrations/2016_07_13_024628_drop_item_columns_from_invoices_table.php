<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropItemColumnsFromInvoicesTable extends Migration
{
  public function up()
  {
    Schema::table('invoices', function ($table) {
      $table->dropColumn('transaction_id');
      $table->dropColumn('product_id');
      $table->dropColumn('quantity');
      $table->dropColumn('amount');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('invoices', function ($table) {
      $table->integer('transaction_id')->after('invoice_date');
      $table->integer('product_id')->after('transaction_id');
      $table->integer('quantity')->after('product_id');
      $table->decimal('amount',5,2)->after('quantity');
    });
  }
}
