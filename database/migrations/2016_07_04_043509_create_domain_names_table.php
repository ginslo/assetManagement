<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDomainNamesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('domain_names', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->unique();
			$table->integer('registrar_id');
			$table->integer('user_id');
			$table->dateTime('creation_date');
			$table->dateTime('expiration_date');
			$table->decimal('price', 11)->default(0.00);
			$table->decimal('cost', 11)->default(0.00);
			$table->boolean('auto_renew')->default(1);
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
