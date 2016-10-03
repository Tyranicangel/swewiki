<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('passwords', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->integer('user')->unsigned();
			$table->foreign('user')->references('id')->on('users');
			$table->string('old_password',100);
			$table->string('new_password',100);
			$table->string('change_type',20);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('passwords');
	}

}
