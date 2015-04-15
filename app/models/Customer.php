<?php

class Customer extends \Eloquent {
	protected $fillable = [];
	protected $table ="customers";


	protected static function getCustomerDetails($id)
	{

	}

	protected static function getCustomerByEmail($email)
	{
		$customer = DB::table('customers')
				->where('email', '=', $email)
				->get();
		return $customer;
	}
}
