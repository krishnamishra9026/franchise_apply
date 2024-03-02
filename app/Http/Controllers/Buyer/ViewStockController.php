<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\CarSeller;

class ViewStockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:buyer');
    }

    public function viewStock($id)
    {
        $car_seller = CarSeller::with('car', 'seller')->where('id',$id)->first();     

        return view('buyer.liveStock.viewStock', compact('car_seller'));
    }
}
