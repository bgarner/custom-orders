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

		$this->call('BrandsTableSeeder');
		$this->command->info('Brands table seeded!');

		$this->call('CategoriesTableSeeder');
		$this->command->info('Categories table seeded!');

		$this->call('CustomersTableSeeder');
		$this->command->info('Customers table seeded!');

		$this->call('ProductTableSeeder');
		$this->command->info('Product table seeded!');

		$this->call('OrderTableSeeder');
		$this->command->info('Order table seeded!');

		$this->call('OrderItemTableSeeder');
		$this->command->info('Order Items table seeded!');


	}

}


class UserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();

		User::create(array('username' => 'superadmin', 'first_name' => 'first1', 'last_name' => 'last1', 'role_id' => '1', 'status' => '1', 'store' => '0', 'email' => 'foo@bar.com', 'password' => Hash::make('1234')));
		User::create(array('username' => 'storeadmin', 'first_name' => 'first2', 'last_name' => 'last2', 'role_id' => '2', 'status' => '1', 'store' => '123', 'email' => 'test@test.com', 'password' => Hash::make('1234')));
		User::create(array('username' => 'sales1', 'first_name' => 'first3', 'last_name' => 'last3', 'role_id' => '3', 'status' => '1', 'store' => '123', 'email' => 'hello@hello.com', 'password' => Hash::make('1234')));
		User::create(array('username' => 'sales2', 'first_name' => 'first4', 'last_name' => 'last4', 'role_id' => '3', 'status' => '1', 'store' => '123', 'email' => 'brent@brent.com', 'password' => Hash::make('1234')));
		User::create(array('username' => 'sales3', 'first_name' => 'first5', 'last_name' => 'last5', 'role_id' => '4', 'status' => '1', 'store' => '123', 'email' => 'one@more.com', 'password' => Hash::make('1234')));
	}
}


class BrandsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('brands')->delete();

		Brand::create(array('brand' => 'Nike' ));
		Brand::create(array('brand' => 'Ping' ));
		Brand::create(array('brand' => 'Taylormade' ));
		Brand::create(array('brand' => 'Adams' ));
		Brand::create(array('brand' => 'Callaway' ));
		Brand::create(array('brand' => 'Titlest' ));
		Brand::create(array('brand' => 'Bridgestone' ));
		Brand::create(array('brand' => 'Adidas' ));
		Brand::create(array('brand' => 'Cleveland' ));
		Brand::create(array('brand' => 'Cobra' ));
	}
}

class CategoriesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('categories')->delete();

		Category::create(array('category_name' => 'Drivers' ));
		Category::create(array('category_name' => 'Irons' ));
		Category::create(array('category_name' => 'Wedges' ));
		Category::create(array('category_name' => 'Putters' ));
		Category::create(array('category_name' => 'Specialty Clubs' ));
		Category::create(array('category_name' => 'Iron Sets' ));
		Category::create(array('category_name' => 'Gloves' ));
		Category::create(array('category_name' => 'Shoes' ));
		Category::create(array('category_name' => 'Bags' ));
		Category::create(array('category_name' => 'Balls' ));
		Category::create(array('category_name' => 'Custom Balls' ));
	}
}


class CustomersTableSeeder extends Seeder {

	public function run()
	{
		DB::table('customers')->delete();

		$faker = Faker\Factory::create();

		for($i = 0; $i < 100; $i++) {
		//	$customers = Customer::create(array(
			DB::table('customers')->insert(array(
				'prefix' => 'Mr.',
				'first_name' => $faker->firstNameMale,
				'last_name' => $faker->lastName,
				'email' => $faker->email,
				'address1' => $faker->streetAddress,
				'address2' => '',
				'city' => $faker->city,
				'province' => $faker->state,
				'postal_code' => $faker->postcode,
				'home_phone' => $faker->phoneNumber,
				'work_phone' => $faker->phoneNumber,
				'cell_phone' => $faker->phoneNumber
			));
		}
	}
}

class ProductTableSeeder extends Seeder {

	public function run()
	{
		DB::table('products');

		$faker = Faker\Factory::create();

		for($i = 0; $i < 1000; $i++) {
			DB::table('products')->insert(array(
				'brand' => $faker->numberBetween(1,10),
				'category' => $faker->numberBetween(1,11),
				'name' => $faker->sentence(3),
				'description' => $faker->paragraph(4),
				'price' => $faker->randomFloat(2, 1.00, 2999.99),
				'available' => '1'
			));
		}
	}

}

class OrderTableSeeder extends Seeder {

	public function run()
	{
		DB::table('orders');

		$faker = Faker\Factory::create();

		for($i = 0; $i < 500; $i++) {
			DB::table('orders')->insert(array(
				'customer' => $faker->numberBetween(1,1000),
				'status' => $faker->numberBetween(1,5),
				'staff' => $faker->numberBetween(2,5),
				'description' => $faker->paragraph(1)
			));
		}
	}

}


class OrderItemTableSeeder extends Seeder {

	public function run()
	{
		DB::table('order_items');

		$faker = Faker\Factory::create();

		for($i = 0; $i < 1000; $i++) {
			DB::table('order_items')->insert(array(
				'order_id' => $faker->numberBetween(1,500),
				'product' => $faker->numberBetween(1,1000),
				'quantity' => $faker->numberBetween(1,3),
				'description' => $faker->paragraph(1)
			));
		}
	}

}
