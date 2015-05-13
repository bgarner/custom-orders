<?php

class ProductController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /product
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /product/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /product
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /product/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /product/{id}/edit
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
	 * PUT /product/{id}
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
	 * DELETE /product/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function getBrandsByCategroy()
	{
		$this->layout = null;
		$id = Input::get('id');

		$brandIDs = DB::table('products')
			->distinct()
			->select('brand')
			->where('category','=', $id)
			->orderBy('brand')
			->get();

		// foreach($brandIDs as $bt){
		// 	echo "brand id :" . $bt->brand . "<br />";
		// }
		$brandNames = Array();
		//dd($brandIDs);
		foreach($brandIDs as $b){
			$brandName = Brand::find($b->brand);
	//		dd($brandName);
			$brandNames[$b->brand] = $brandName->brand;
		}

		if(Request::ajax()){

			/* not enough parameters */
			if( $id== 0 || !$id ) {
				$response = array(
					'status' => 'not enough params'
				);
				return Response::json($response);
			}

			if( count($brandNames) > 0) {
				return Response::json($brandNames);
			} else {
				/* no brands in that category */
				$response = array(
					'status' => 'no brands',
				);
				return Response::json($response);
			}

		} else {
			/* something has gone wrong with ajax */
			return "I don't know if this is ajaxing";
		}
	}

	public function getProductsByBrandAndCategory()
	{
		$this->layout = null;
		$brandID = Input::get('brand_id');
		$catID = Input::get('cat_id');

		Log::info('cat: ' . $catID . ' brand: ' . $brandID );

		$products = DB::table('products')
			->where('category','=', $catID)
			->where('brand','=', $brandID, 'AND')
			->get();

		if(Request::ajax()){

			/* not enough parameters */
			if( $catID == 0 || !$catID || $brandID == 0 || !$brandID ) {
				$response = array(
					'status' => 'not enough params'
				);
				return Response::json($response);
			}

			if( count($products) > 0) {
				return Response::json($products);
			} else {
				/* no products found */
				$response = array(
					'status' => 'no products'
				);
				return Response::json($response);
			}

		/* something has gone wrong with ajax */
		} else {
			return "I don't know if this is ajaxing";
		}
	}

}
