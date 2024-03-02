<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Buyer;
use App\Models\Seller;
use App\Models\Earning;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:administrator');
        $this->middleware(['permission:dashboard']);
    }

    public function index()
    {
        $new_orders = Order::where('status', 1)->orwhere('status', 0)->count();
        $po_created = Order::whereNotNull('seller_id')->count();
        $rejected_orders = Order::where('status', 4)->count();
        $total_buyer = Buyer::count();
        $total_seller = Seller::count();
        $total_earning = Earning::sum('commission_earned');

        $orders = Order::with('buyer')->orderBy('id', 'desc')->take(5)->get();

        return view('admin.dashboard.dashboard', compact('new_orders', 'po_created', 'rejected_orders', 'orders', 'total_buyer', 'total_seller', 'total_earning'));
    }
}
