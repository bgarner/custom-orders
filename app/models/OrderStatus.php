<?php

class OrderStatus extends \Eloquent {
	protected $fillable = [];
	protected $table = "order_status";

	protected function lookUpStatus($id)
	{
		$status = DB::table('order_status')
			->where('id', '=', $id)
			->get();
		return $status[0]->status;
	}

}
