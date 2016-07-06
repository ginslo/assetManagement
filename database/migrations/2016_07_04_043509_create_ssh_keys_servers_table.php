<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSshKeysServersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ssh_keys_servers', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('ssh_key_id');
			$table->integer('server_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ssh_keys_servers');
	}

}
