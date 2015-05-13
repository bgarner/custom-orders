<?php

class OrderFormController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /orderform
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /orderform/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /orderform
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /orderform/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{

	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /orderform/{id}/edit
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
	 * PUT /orderform/{id}
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
	 * DELETE /orderform/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function getJsonDescription(){
		$this->layout = null;
		$catID = Input::get('id');
		$categoryData = Category::find($catID);

		Log::info('cat: ' . $catID );
		Log::info('order form ID: ' . $categoryData->order_form_id );

		$form = OrderForm::find($categoryData->order_form_id);

		if(Request::ajax()){

			/* not enough parameters */
			if( $catID == 0 || !$catID ) {
				$response = array(
					'status' => 'not enough params'
				);
				return Response::json($response);
			}

			if( count($form) > 0) {
				return Response::json($form);

			} else {
				/* no products found */
				$response = array(
					'status' => 'no form found'
				);
				return Response::json($response);
			}

		/* something has gone wrong with ajax */
		} else {
			return "I don't know if this is ajaxing";
		}

	}

}
