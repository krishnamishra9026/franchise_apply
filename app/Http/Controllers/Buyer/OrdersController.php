<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:buyer');
    }

    public function OrdersController()
    {
        return view('buyer.orders.orders');
    }
    public function ViewOrder()
    {
        return view('buyer.orders.view-order');
    }
}
