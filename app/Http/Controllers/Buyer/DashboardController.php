<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\CarSeller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:buyer');
    }

    public function index()
    {

        $new_orders = Order::where('buyer_id', auth()->guard('buyer')->user()->id)->where('status', 1)->orwhere('status', 0)->count();
        $accepted_orders = Order::where('buyer_id', auth()->guard('buyer')->user()->id)->where('status', 2)->count();
        $rejected_orders = Order::where('buyer_id', auth()->guard('buyer')->user()->id)->where('status', 4)->count();
        $delivered_orders = Order::where('buyer_id', auth()->guard('buyer')->user()->id)->where('status', 3)->count();

        $orders = Order::where('buyer_id', auth()->guard('buyer')->user()->id)->orderBy('id', 'desc')->take(5)->get();

        return view('buyer.dashboard.dashboard', compact('new_orders', 'accepted_orders', 'rejected_orders', 'delivered_orders', 'orders'));
    }
}
