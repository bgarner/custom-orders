<?php

class OrderController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /ordercontorller
	 *
	 * @return Response
	 */
	public function index()
	{
		$store_number = Auth::user()->store;
		if( $store_number == "99999" ){
			$orders = DB::table('orders')->paginate(20);
		} else {
			$orders = Order::getOrders( $store_number );
		}

		$orderStatusTypes = OrderStatus::all();
		return View::make('orders/orderstable')
			->with('types', $orderStatusTypes)
			->with('orders', $orders);
	}


	public function indexByType( $type )
	{
		$store_number = Auth::user()->store;
		$orders = Order::getOrdersByType( $store_number, $type );
		$orderStatusTypes = OrderStatus::all();
		return View::make('orders/orderstable')
			->with('types', $orderStatusTypes)
			->with('orders', $orders);
	}
	/**
	 * Show the form for creating a new resource.
	 * GET /ordercontorller/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('orders/new');
	}


	public function newForm()
	{
		$cutomerId = Input::get('customerId');
		//get customer info
		$categories = Category::all();
		$customer = Customer::find($cutomerId);
		return View::make('orders/orderform')
			->with('categories', $categories)
			->with('customer', $customer);
	}
	/**
	 * Store a newly created resource in storage.
	 * POST /ordercontorller
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /ordercontorller/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$order = Order::find($id);
		$orderitems = OrderItem::show($id);
		$ordertracking = OrderTracking::show($id);
		$ordertrackingstatus = OrderHistoryStatus::all();
		$orderStatusTypes = OrderStatus::all();
		//$ordertrackingstatus = OrderHistoryStatus::orderBy('created_at', 'asc')->get();
		return View::make('orders/orderdetail')
			->with('order', $order)
			->with('orderitems', $orderitems)
			->with('ordertrackingstatus', $ordertrackingstatus)
			->with('orderstatustypes', $orderStatusTypes)
			->with('ordertracking', $ordertracking);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /ordercontorller/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{


	}

	/**
	 * Update the specified resource in storage.
	 * PUT /ordercontorller/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /ordercontorller/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


	public function postOrderStatus()
	{
		$orderstatusdetails = array(
			'order_id' => Input::get('order_id'),
			'user' => Input::get('user'),
			'order_status_type' => Input::get('order_status_type'),
			'description' => Input::get('description')
		);

		$orderstatus = OrderTracking::create($orderstatusdetails);
		$orderstatus->save();
	}

	public function postUpdateStatus()
	{
		if( Input::get('order_status') == 0 ){
			return;
		}

		$id= Input::get('order_id');
		// $orderStatus = array(
		// 	'status' => Input::get('order_status')
		// );
		$order = Order::find($id);
		$order->status = Input::get('order_status');
		$order->save();
		//Order::find($id)->update($orderStatus);
	}
}
