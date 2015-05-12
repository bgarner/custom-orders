<?php

class Order extends \Eloquent {
	protected $fillable = [];

	protected function getOrders( $store_number )
	{
		$orders = DB::table('orders')
				->where('store', '=', $store_number)
				->paginate(20);
		return $orders;
	}

	protected function getOrdersByType( $store_number, $type )
	{
		if( $store_number == "99999") {
			$orders = DB::table('orders')
				->where('status', '=', $type)
				->paginate(20);
		} else {
			$orders = DB::table('orders')
				->where('store', '=', $store_number )
				->where('status', '=', $type)
				->paginate(20);
		}
		return $orders;
	}


	protected function getCustomerOrders( $custid )
	{
		$orders = DB::table('orders')
			->where('customer', '=', $custid)
			->get();
		return $orders;
	}

	protected function getCountofOrdersInProgress( $store_number )
	{
		$orders = DB::table('orders')
			->where('store','=', $store_number)
			->where('status','!=','9' )
			->count();
		return $orders;
	}
}
