<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
			$table->timestamps();
			$table->string('username',100)->unique();
			$table->string('name',100);
			$table->string('email',100)->unique();
			$table->text('address');
			$table->string('phoneno',20);
			$table->string('designation',100);
			$table->string('password',100);
			$table->integer('role')->unsigned();
			$table->foreign('role')->references('id')->on('roles');
			$table->integer('created_by')->unsigned()->default(0);
			$table->integer('active')->unsigned()->default(1);
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
