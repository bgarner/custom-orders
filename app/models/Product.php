<?php

class Product extends \Eloquent {
	protected $fillable = [];
	protected $table = "products";

	// public static function getProduct($id)
	// {
	// 	$product = DB::table('products')
	// 		->where('id','=', $id)
	// 		-get();
	// 	return $product;
	// }

}
