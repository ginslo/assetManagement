<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomainNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domain_names', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('registrar_id');
            $table->integer('user_id');
            $table->dateTime('creation_date');
            $table->dateTime('expiration_date');
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
        Schema::drop('domain_names');
    }
}
