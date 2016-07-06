<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWebsitesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('websites', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('subdomain');
			$table->integer('domain_name_id');
			$table->integer('user_id');
			$table->integer('server_id');
			$table->integer('application_id');
			$table->string('bugtracker_name', 56)->nullable();
			$table->string('ci_name', 48)->default('None');
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
		Schema::drop('websites');
	}

}
