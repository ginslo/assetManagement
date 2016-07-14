<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('orders', function(Blueprint $table)
      {
        $table->increments('id');
        $table->string('transaction_no',24);
        $table->integer('invoice_id');
        $table->string('transaction_status', 24);
        $table->dateTime('submit_date')->default('0000-00-00 00:00:00');
        $table->integer('user_id');
        $table->string('card_id', 2);
        $table->string('payment_method', 18);
        $table->decimal('payment_amount', 5, 2)->default(0.00);
        $table->dateTime('settlement_date')->default('0000-00-00 00:00:00');
        $table->decimal('settlement_amount', 5, 2)->default(0.00);
        $table->boolean('recurring')->default('0');
        $table->integer('period_id')->defaul('1');
        $table->string('subscriber_no',24);
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
        Schema::drop('orders');
    }
}
