<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\CarSeller;

class BuyStockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:buyer');
    }

    public function buyStock($car_id, $seller_id=null)
    {
        $car_seller = CarSeller::where('car_id', $car_id)->Where('seller_id', $seller_id)->first();

        return view('buyer.liveStock.buyStock', compact('car_id', 'seller_id', 'car_seller'));
    }
}
