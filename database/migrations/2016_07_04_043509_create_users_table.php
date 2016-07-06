<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('first_name');
			$table->string('last_name');
			$table->integer('company_id')->unsigned();
			$table->string('avatar', 48)->default('default.jpg');
			$table->string('email')->unique();
			$table->string('crm_id', 48)->nullable()->unique('crm_id');
			$table->string('password');
			$table->string('remember_token', 100)->nullable();
			$table->boolean('is_admin')->default(0);
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
		Schema::drop('users');
	}

}
