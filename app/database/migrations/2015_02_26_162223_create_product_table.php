<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function($table)
		{
			$table->increments('id')->index();
			$table->integer('brand')->references('brands')->on('id');
			$table->integer('category')->references('categories')->on('id');
			$table->longText('name');
			$table->longText('description');
			$table->decimal('price', 7, 2);
			$table->boolean('available');
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
