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
		$orders = Order::paginate(20);
		return View::make('orders/orderstable')
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
		return View::make('orders/orderdetail')
			->with('order', $order)
			->with('orderitems', $orderitems)
			->with('ordertrackingstatus', $ordertrackingstatus)
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
		//
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

}
