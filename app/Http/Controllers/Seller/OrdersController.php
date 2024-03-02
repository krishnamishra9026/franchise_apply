<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:seller');
    }

    public function Orders()
    {
        return view('seller.orders.orders');
    }
    public function ViewOrder()
    {
        return view('seller.orders.view-order');
    }
}
