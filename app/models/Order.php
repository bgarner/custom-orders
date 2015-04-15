<?php

class Order extends \Eloquent {
	protected $fillable = [];

	protected function getOrders( $store_number )
	{
		//dd( $store_number );
		$orders = DB::table('orders')
				->where('store', '=', $store_number)
				->paginate(20);
			//	->get();

		return $orders;
	}
}
