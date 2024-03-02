<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\CarRange;
use App\Models\CarModel;
use App\Models\CarMake;
use App\Models\CarModelSeries;
use App\Models\Car;
use App\Models\Seller;
use App\Models\CarSeller;
use Illuminate\Http\Request;


class LiveStockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:buyer');
    }

    public function liveStock(Request $request)
    {

        $filter_manufacturer    = $request->input('filter_manufacturer');
        $filter_model           = $request->input('filter_model');
        $filter_variant         = $request->input('filter_variant');
        $filter_uvc             = $request->input('filter_uvc');

        $manufacturers = CarMake::get(['name', 'id']);
        $variants = CarModel::get(['name', 'id']);
        $models = CarRange::get(['name', 'id']);
        $ranges = CarModelSeries::get(['name', 'id']); 

        $seller_cars = CarSeller::with('car', 'seller')->latest('id');   

        $seller_cars_count = $seller_cars->count();

        if (isset($request->filter_manufacturer)) {

            $seller_cars->whereHas('car', function ($query) use ($filter_manufacturer) {
                $query->where('make', $filter_manufacturer);
            });
        }

        if ($request->filter_model) {
            $seller_cars->whereHas('car', function ($query) use ($filter_model) {
                $query->where('range', $filter_model);
            });
        }

        if ($request->filter_variant) {
            $seller_cars->whereHas('car', function ($query) use ($filter_variant) {
                $query->where('model', $filter_variant);
            });
        }     

        if ($request->filter_uvc) {
            $seller_cars->whereHas('car', function ($query) use ($filter_uvc) {
                $query->where('uvc', 'LIKE', '%' . $filter_uvc . '%');
            });
        }          

        $seller_cars = $seller_cars->paginate(15);

        return view('buyer.liveStock.liveStock', compact('manufacturers', 'variants', 'models', 'ranges', 'seller_cars', 'seller_cars_count'));
    }
}
