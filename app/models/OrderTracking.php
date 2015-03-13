<?php

class OrderTracking extends \Eloquent {
    protected $fillable = [];
    protected $table = "order_tracking";

    public static function show($id)
    {
        $ordertracking = DB::table('order_tracking')
            ->where('order_id', '=', $id)
            ->orderBy('updated_at', 'ASC')
            ->get();
        return $ordertracking;
    }
}
