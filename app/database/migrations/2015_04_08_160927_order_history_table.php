<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_history', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('order_id')->references('orders')->on('id');
			$table->integer('status_id')->references('order_history_status_types')->on('id');
			$table->longText('status_details');
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
