<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Role;
use App\User;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('RoleTableSeeder');
		$this->call('UserTableSeeder');
	}

}

class RoleTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		Role::create(['role'=>'Admin','link'=>'admin.main']);
	}

}

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		User::create(['username'=>'admin','name'=>'Admin','email'=>'admin@admin.com','address'=>'Admin','phoneno'=>'admin','designation'=>'Admin','password'=>'a4052444ba2fa4fb0fa37db35cf8b5bff0e8b8cdce3b8d24c09f40e980ce35fe','role'=>1,'created_by'=>0]);
	}

}
