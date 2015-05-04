<?php

class CustomerController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /customer
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /customer/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('customers/new');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /customer
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /customer/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$customer = Customer::find($id);
		$orders = Order::getCustomerOrders($id);
		// $order = Order::find($id);
		// $orderitems = OrderItem::show($id);
		// $ordertracking = OrderTracking::show($id);
		// $ordertrackingstatus = OrderHistoryStatus::all();
		//$ordertrackingstatus = OrderHistoryStatus::orderBy('created_at', 'asc')->get();
		// return View::make('orders/orderdetail')
		// 	->with('order', $order)
		// 	->with('orderitems', $orderitems)
		// 	->with('ordertrackingstatus', $ordertrackingstatus)
		// 	->with('ordertracking', $ordertracking);

		return View::make('customers/profile')
			->with('customer', $customer)
			->with('orders', $orders);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /customer/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('customers/edit');
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /customer/{id}
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
	 * DELETE /customer/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function customerLookUp()
	{
		$this->layout = null;
		$email = Input::get('returningCustomerEmail');
		// dd($email);
		if(Request::ajax()){

			$customer = Customer::getCustomerByEmail( $email );

			// $customerName =  $customer->first_name . " " . $customer->last_name;

			if( count($customer) > 0) {
				Log::info( $customer[0]->first_name );

				$customerName = $customer[0]->first_name . " " . $customer[0]->last_name;
				if($customer[0]->address2 != ""){
					$customerAddress = $customer[0]->address1 . "<br />" . $customer[0]->address2;
				} else {
					$customerAddress = $customer[0]->address1;
				}
				$customerId = $customer[0]->id;
				$customerCity = $customer[0]->city;
				$customerProv = $customer[0]->province;
				$customerPC = $customer[0]->postal_code;
				$customerHome = $customer[0]->home_phone;
				$customerWork = $customer[0]->work_phone;
				$customerCell = $customer[0]->cell_phone;
				$customerEmail = $customer[0]->email;

				$response = array(
					'status' => 'success',
					'msg' => 'found this person',
					'customername' => $customerName,
					'customeraddress' => $customerAddress,
					'customercity' => $customerCity,
					'customerprov' => $customerProv,
					'customerpc' => $customerPC,
					'customerhomephone' => $customerHome,
					'customerworkphone' => $customerWork,
					'customercellphone' => $customerCell,
					'customeremail' => $customerEmail,
					'customerid' => $customerId
				);
				return Response::json($response);
			} else {
				$response = array(
					'status' => 'Customer not found. Try again, or create a new record.',
					'msg' => 'not found',
				);
				return Response::json($response);
			}

		} else {
			return "I don't know if this is ajaxing";
		}


		// if( count($customer) > 0) {
		// 	return "got it";
		// } else {
		// 	return "customer not found";
		// }
	}

}
