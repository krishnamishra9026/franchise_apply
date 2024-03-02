<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Seller;
use App\Models\CarSeller;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:administrator');
        $this->middleware(['permission:orders']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter_status            = $request->input('filter_status');
        $filter_seller            = $request->input('filter_seller');
        $filter_date              = $request->input('filter_date');
        $filter_vehicle           = $request->input('filter_vehicle');
        $filter_phone             = $request->input('filter_phone');

        $orders = Order::whereIn('status', [0,1])->orderBy('id', 'desc');
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

        return view('admin.orders.orders', compact('orders', 'sellers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::with('car', 'seller', 'buyer')->find($id);
        $car_seller = CarSeller::where(['car_id' => $order->car_id, 'seller_id' => $order->seller_id])->first();

        return view('admin.orders.view-order', compact('order', 'car_seller'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'quantity'                  => ['required'],
            'seller_id'                 => ['required'],
        ]);

        $input = $request->except('_token', '_method');
    
        Order::find($id)->update($input);

        return redirect()->route('admin.orders.index')->with('success', 'Po generated successfully!');           
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function markAsRead($value='')
    {
        auth()->guard('administrator')->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }
}
