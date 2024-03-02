<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;

use App\Models\CarRange;
use App\Models\CarModel;
use App\Models\CarMake;
use App\Models\CarModelSeries;
use App\Models\Car;
use App\Models\CarSeller;
use Illuminate\Http\Request;


class VehicleSearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:buyer');
    }

    public function VehicleSearchController(Request $request)
    {
        $makes = CarMake::get(['name', 'id']);
        $ranges = CarRange::get(['name', 'id']);
        $models = CarModel::get(['name', 'id']);
        $model_series = CarModelSeries::get(['name', 'id']);  

        if($request->make && $request->range && $request->model && $request->variant) {

            $make = CarMake::where('id', $request->make)->value('name');
            $range = CarRange::where('id', $request->range)->value('name');
            $model = CarModel::where('id', $request->model)->value('name');
            $variant = CarModelSeries::where('id', $request->variant)->value('name');

            $car = Car::where(['make' => $request->make, 'range' => $request->range, 'model' => $request->model, 'model_series' => $request->variant])->first();          

            return view('buyer.vehicle.vehicle-search', compact('makes', 'ranges', 'models', 'model_series', 'range', 'make', 'model', 'variant', 'car'));            

        }else if($request->make && $request->range && $request->model) {

            $make = CarMake::where('id', $request->make)->value('name');
            $range = CarRange::where('id', $request->range)->value('name');
            $model = CarModel::where('id', $request->model)->value('name');

            $cars = Car::with('CarModelSeries')->where(['make' => $request->make, 'range' => $request->range, 'model' => $request->model])->get(['model_series']);  
                      

            return view('buyer.vehicle.vehicle-search-step4', compact('makes', 'ranges', 'models', 'model_series', 'range', 'make', 'model', 'cars'));            

        }else if($request->make && $request->range) {

            $make = CarMake::where('id', $request->make)->value('name');
            $range = CarRange::where('id', $request->range)->value('name');  

            $cars = Car::with('CarModel')->where(['make' => $request->make, 'range' => $request->range])->get(['model']);                       

            return view('buyer.vehicle.vehicle-search-step3', compact('makes', 'ranges', 'models', 'model_series', 'range', 'make', 'cars'));

        }else  if($request->make){

            $make = CarMake::where('id', $request->make)->value('name');

            $cars = Car::with('CarRange')->where('make', $request->make)->get(['range']);                 

            return view('buyer.vehicle.vehicle-search-step2', compact('makes', 'ranges', 'models', 'model_series', 'make', 'cars'));

        }else{

            return view('buyer.vehicle.vehicle-search-step1', compact('makes', 'ranges', 'models', 'model_series'));
        }
        return view('buyer.vehicle.vehicle-search-step1', compact('makes', 'ranges', 'models', 'model_series'));
    }
}
