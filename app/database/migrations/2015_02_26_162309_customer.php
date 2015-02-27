<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Customer extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function($table)
		{
			$table->increments('id')->index();
			$table->string('prefix');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('email');
			$table->string('address1');
			$table->string('address2');
			$table->string('city');
			$table->string('province');
			$table->string('postal_code');
			$table->string('home_phone');
			$table->string('work_phone');
			$table->string('cell_phone');
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
		//
	}

}
