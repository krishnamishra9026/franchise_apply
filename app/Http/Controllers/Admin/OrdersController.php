<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\PurchaseOrder;
use App\Models\Seller;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:administrator');
        $this->middleware(['permission:orders']);
    }

    public function orders()
    {
        return view('admin.orders.orders');
    }
    public function generatePO($id)
    {
        $order = Order::with('car', 'seller', 'buyer')->find($id);
        $sellers = Seller::orderBy('id', 'desc')->get(['firstname', 'lastname', 'id']);

        return view('admin.orders.generate-purchase-order', compact('id', 'order', 'sellers'));
    }
    public function purchaseOrder(Request $request)
    {        
        $filter_status            = $request->input('filter_status');
        $filter_seller            = $request->input('filter_seller');
        $filter_date              = $request->input('filter_date');
        $filter_vehicle           = $request->input('filter_vehicle');
        $filter_phone             = $request->input('filter_phone');

        $orders = PurchaseOrder::orderBy('id', 'desc');
        
        $sellers = Seller::orderBy('id', 'desc')->get(['firstname', 'lastname', 'id']);

        if ($request->filter_vehicle) {

            $orders->whereHas('car', function ($query) use ($filter_vehicle) {
                $query->whereHas('carMake', function ($q) use ($filter_vehicle) {
                    $q->where('name', 'LIKE', '%' . $filter_vehicle . '%');
                })->orWhereHas('carModel', function ($q) use ($filter_vehicle) {
                    $q->where('name', 'LIKE', '%' . $filter_vehicle . '%');
                });
            });

        }

        if (isset($request->filter_status)) {
            $orders->where('status', $request->input('filter_status'));
        }

        if ($request->filter_seller) {
            $orders->where('seller_id', $request->input('filter_seller'));
        }  

        if ($request->filter_date) {
            $from   = date("Y-m-d", strtotime($request->input('filter_date')));
            $orders->whereDate('created_at', $from);
        }            

        $orders = $orders->paginate(15);   

        return view('admin.orders.purchase-orders', compact('orders', 'sellers'));
    }

    public function viewOrder()
    {
        return view('admin.orders.view-order');
    }
}
