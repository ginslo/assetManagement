<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('card_number');
            $table->date('card_expiration')->default('0000-00-00');
            $table->integer('period_id');
            $table->decimal('amount', 5,2)->default(0.00);;
            $table->string('subscriptionid')->unique();
            $table->string('name');
            $table->integer('invoice_id');
            $table->string('description');
            $table->integer('day_of_month');
            $table->date('start_date')->default('0000-00-00');
            $table->date('end_date')->default('0000-00-00');
            $table->decimal('trial_amount', 5,2)->default(0.00);
            $table->integer('trial_occurrences')->default(0);
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
        Schema::drop('subscriptions');
    }
}
