<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('invoice_items', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('invoice_id');
          $table->integer('product_id');
          $table->integer('server_id');
          $table->string('memo');
          $table->integer('quantity');
          $table->decimal('amount',5,2);
          $table->boolean('taxable');
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('invoice_items');
    }
}
