<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->command->info('User table seeded!');
	}

}


class UserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();

		User::create(array('username' => 'superadmin', 'first_name' => 'first1', 'last_name' => 'last1', 'role_id' => '1', 'store' => '0', 'email' => 'foo@bar.com', 'password' => Hash::make('1234')));
		User::create(array('username' => 'storeadmin', 'first_name' => 'first2', 'last_name' => 'last2', 'role_id' => '2', 'store' => '123', 'email' => 'test@test.com', 'password' => Hash::make('1234')));
		User::create(array('username' => 'sales1', 'first_name' => 'first3', 'last_name' => 'last3', 'role_id' => '3', 'store' => '123', 'email' => 'hello@hello.com', 'password' => Hash::make('1234')));
		User::create(array('username' => 'sales2', 'first_name' => 'first4', 'last_name' => 'last4', 'role_id' => '3', 'store' => '123', 'email' => 'brent@brent.com', 'password' => Hash::make('1234')));
		User::create(array('username' => 'sales3', 'first_name' => 'first5', 'last_name' => 'last5', 'role_id' => '4', 'store' => '123', 'email' => 'one@more.com', 'password' => Hash::make('1234')));
	}
}
