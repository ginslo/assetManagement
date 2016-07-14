<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('sales');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('sales', function(Blueprint $table)
      {
        $table->increments('id');
        $table->integer('user_id');
        $table->string('sku', 6);
        $table->integer('invoice_id');
        $table->string('status_id', 24);
        $table->dateTime('submit_date')->default('0000-00-00 00:00:00');
        $table->string('card_id', 2);
        $table->string('payment_method', 18);
        $table->dateTime('settlement_date')->default('0000-00-00 00:00:00');
        $table->decimal('payment_amount', 11)->default(0.00);
        $table->decimal('settlement_amount', 11)->default(0.00);
        $table->boolean('recurring')->default('0');
        $table->integer('period_id')->defaul('1');
        $table->string('subscriber_id',24);
        $table->string('transaction_id',24);
        $table->decimal('cost', 11)->default(0.00);
        $table->timestamps();
      });
    }
}
