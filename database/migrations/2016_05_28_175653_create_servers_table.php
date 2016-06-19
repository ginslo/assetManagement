<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('provider_id');
            $table->integer('datacenter_id');
            $table->tinyInteger('state');
            $table->string('hostname');
            $table->string('friendly_name');
            $table->string('instance_id');
            $table->string('size');
            $table->integer('function');
            $table->string('ip_public');
            $table->string('ip_private');
            $table->integer('os_id');
            $table->integer('os_version_id');
            $table->string('kernel');
            $table->dateTime('repo_update');
            $table->string('memory');
            $table->integer('user_id');
            $table->integer('price');
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
