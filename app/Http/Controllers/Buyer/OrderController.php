<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\CarSeller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter_status            = $request->input('filter_status');
        $filter_availability      = $request->input('filter_availability');
        $filter_date              = $request->input('filter_date');
        $filter_vehicle           = $request->input('filter_vehicle');
        $filter_phone             = $request->input('filter_phone');

        $orders = Order::where('buyer_id', auth()->guard('buyer')->user()->id)->orderBy('id', 'desc');

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

        if ($request->filter_availability) {
            $orders->where('availability', 'LIKE', '%' . $request->input('filter_availability') . '%');
        }  

        if ($request->filter_date) {
            $from   = date("Y-m-d", strtotime($request->input('filter_date')));
            $orders->whereDate('created_at', $from);
        }            

        $orders = $orders->paginate(15);    

        return view('buyer.orders.orders', compact('orders'));
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
        $request->validate([
            'first_name'            => ['required'],
            'email'                 => ['required'],
        ]);

        $input = $request->except('_token');              

        if (!isset($request->seller_id) && empty($request->seller_id)) {
            $input['availability'] = 'With Dealer';
        }

        $sub_total = getCarSellerPriceTotal($input['car_id'], $input['seller_id']);
        $vat = round(($sub_total*5)/100, 2);
        $total = $sub_total + $vat;

        $input['sub_total'] = $sub_total;
        $input['vat'] = $vat;
        $input['total'] = $total;

        $order = Order::create($input);

        return redirect()->route('buyer.orders.index')->with('success', 'Order added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::with('car', 'seller', 'buyer')->find($id);
        $car_seller = CarSeller::where(['car_id' => $order->car_id, 'seller_id' => $order->seller_id])->first();

        return view('buyer.orders.view-order', compact('order', 'car_seller'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
