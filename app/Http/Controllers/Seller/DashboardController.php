<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\CarSeller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:seller');
    }

    public function index()
    {

        $new_orders = Order::where('buyer_id', auth()->guard('seller')->user()->id)->where('status', 1)->orwhere('status', 0)->count();
        $accepted_orders = Order::where('buyer_id', auth()->guard('seller')->user()->id)->where('status', 2)->count();
        $rejected_orders = Order::where('buyer_id', auth()->guard('seller')->user()->id)->where('status', 4)->count();
        $delivered_orders = Order::where('buyer_id', auth()->guard('seller')->user()->id)->where('status', 3)->count();

        $orders = Order::where('buyer_id', auth()->guard('seller')->user()->id)->orderBy('id', 'desc')->take(5)->get();
        $seller_cars = CarSeller::with('car', 'seller')->where('seller_id', auth()->guard('seller')->user()->id)->orderBy('id', 'desc')->take(5)->get();  

        return view('seller.dashboard.dashboard', compact('new_orders', 'accepted_orders', 'rejected_orders', 'delivered_orders', 'orders', 'seller_cars'));
    }
}
