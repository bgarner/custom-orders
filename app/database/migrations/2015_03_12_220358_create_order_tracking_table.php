<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderTrackingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_tracking', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('order_id')->references('orders')->on('id');
			$table->integer('order_status_type')->references('order_history_status_types')->on('id');
			$table->integer('user')->references('users')->on('id');
			$table->longText('description');
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
		Schema::drop('order_tracking');
	}

}
