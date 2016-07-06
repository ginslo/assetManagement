<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('servers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->unique();
			$table->integer('user_id');
			$table->integer('provider_id');
			$table->integer('data_center_id');
			$table->integer('distribution_id');
			$table->integer('distribution_version_id');
			$table->integer('purpose_id');
			$table->boolean('state');
			$table->string('hostname');
			$table->string('instance_id');
			$table->string('ip_public');
			$table->string('ip_private');
			$table->string('kernel');
			$table->dateTime('repo_update');
			$table->integer('cores')->nullable();
			$table->string('size');
			$table->string('memory');
			$table->decimal('price', 11)->default(0.00);
			$table->decimal('cost', 11)->default(0.00);
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
		Schema::drop('servers');
	}

}
