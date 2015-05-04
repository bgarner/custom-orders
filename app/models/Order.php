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

	protected function getCustomerOrders( $custid )
	{
		$orders = DB::table('orders')
			->where('customer', '=', $custid)
			->get();
		return $orders;
	}
}
