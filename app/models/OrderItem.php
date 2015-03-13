<?php

class OrderItem extends \Eloquent {
    protected $fillable = [];
    protected $table = "order_items";


    public function index()
    {

    }

    // public function create()
    // {
    //
    // }

    public function store()
    {
        //
    }

    public static function show($id)
    {
        $orderitems = DB::table('order_items')
            ->where('order_id', '=', $id)
            ->get();
        return $orderitems;
    }

    public function edit($id)
    {
        //
    }

    // public function update($id)
    // {
    //     //
    // }

    // public function destroy($id)
    // {
    //     //
    // }
}
