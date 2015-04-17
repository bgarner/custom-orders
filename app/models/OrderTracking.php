<?php

class OrderTracking extends \Eloquent {

    protected $table = "order_tracking";
    protected $fillable = ['order_id', 'order_status_type', 'user', 'description'];

    public static function show($id)
    {
        $ordertracking = DB::table('order_tracking')
            ->where('order_id', '=', $id)
            ->orderBy('updated_at', 'asc')
            ->get();
        return $ordertracking;
    }
}
