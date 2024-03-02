<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Seller;
use App\Models\CarSeller;
use App\Models\CommissionSetting;
use App\Models\Invoice;
use App\Models\Earning;
use App\Models\PurchaseOrder;
use App\Notifications\OrderStatus;
use App\Models\Administrator;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:seller');
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

        $orders = Order::where('seller_id', auth()->guard('seller')->user()->id)->orderBy('id', 'desc');
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

        return view('seller.orders.orders', compact('orders', 'sellers'));
    }

    public function updateStatus($id, $status)
    {
        Order::where('id', $id)->update(['status' => $status]);

        $order = Order::where('id', $id)->first();

        if ($status == 2 || $status == 5 || $status == 4) {

            $order = Order::where('id', $id)->first();

            $order->order_id = $order->id;
            unset($order->id);                  

            PurchaseOrder::create($order->toArray());    

        }

        $route = route('admin.orders.show', $id);
        $seller = Seller::where('id', $order->seller_id)->first();
        $seller_route = route('admin.buyers.show', $seller->id);

        $data = '<span class"order-notice"><a href="'.$seller_route.'" >'.$seller->firstname.' '.$seller->lastname. '</a> Seller, '. getStatus($order->status). ' the Order <a href="'.$route.'" >#'.$id.'</a></span>';


        Administrator::find(1)->notify(new OrderStatus($data));

        if ($status == 3) {
            $this->createInvoice($id);              
        }

        return redirect()->route('seller.orders.index')->with('success', 'Order added successfully');
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

        return view('seller.orders.view-order', compact('order', 'car_seller'));
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

    public function createInvoice($order_id)
    {
        $order = Order::find($order_id);

        $commission_amount = CommissionSetting::where('id', 1)->value('amount') ?? 5;

        $invoice = new Invoice();
        $invoice->order_id = $order->id;
        $invoice->buyer_id = $order->buyer_id;
        $invoice->seller_id = $order->seller_id;
        $invoice->car_id = $order->car_id;
        $invoice->sub_total = $order->sub_total;
        $invoice->total = $order->total;
        $invoice->vat = $order->vat;
        $invoice->status = 1;
        $invoice->save();

        $total = $order->total;
        $commission = round(($total*$commission_amount)/100);
        $sold_price = $total-$commission;

        $earning = new Earning();
        $earning->order_id = $order->id;
        $earning->buyer_id = $order->buyer_id;
        $earning->seller_id = $order->seller_id;
        $earning->car_id = $order->car_id;
        $earning->seller_price = $total;
        $earning->sold_price = $sold_price;
        $earning->commission_earned = $commission;
        $earning->save();
        return  true;
    }
}
