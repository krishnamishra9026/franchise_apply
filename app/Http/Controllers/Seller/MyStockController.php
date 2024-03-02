<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;

use App\Models\CarRange;
use App\Models\CarModel;
use App\Models\CarMake;
use App\Models\CarModelSeries;
use App\Models\Car;
use App\Models\Seller;
use App\Models\CarSeller;
use Illuminate\Http\Request;
use App\Models\CsvData;
use Maatwebsite\Excel\Facades\Excel;
use Session;


class MyStockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:seller');
    }

    public function MyStock(Request $request)
    {
        $filter_manufacturer    = $request->input('filter_manufacturer');
        $filter_model           = $request->input('filter_model');
        $filter_variant         = $request->input('filter_variant');
        $filter_uvc             = $request->input('filter_uvc');

        $manufacturers = CarMake::get(['name', 'id']);
        $models = CarModel::get(['name', 'id']);
        $ranges = CarRange::get(['name', 'id']);
        $variants = CarModelSeries::get(['name', 'id']); 

        $seller_cars = CarSeller::with('car', 'seller')->where('seller_id', auth()->user()->id)->orderBy('id', 'desc');

        $seller_cars_count = $seller_cars->count();  

        if (isset($request->filter_manufacturer)) {

            $seller_cars->whereHas('car', function ($query) use ($filter_manufacturer) {
                $query->where('make', $filter_manufacturer);
            });
        }

        if ($request->filter_model) {
            $seller_cars->whereHas('car', function ($query) use ($filter_model) {
                $query->where('model', $filter_model);
            });
        }

        if ($request->filter_variant) {
            $seller_cars->whereHas('car', function ($query) use ($filter_variant) {
                $query->where('model_series', $filter_variant);
            });
        }     

        if ($request->filter_uvc) {
            $seller_cars->whereHas('car', function ($query) use ($filter_uvc) {
                $query->where('uvc', 'LIKE', '%' . $filter_uvc . '%');
            });
        }          

        $seller_cars = $seller_cars->paginate(15);

        return view('seller.stock.my-stock', compact('manufacturers', 'variants', 'models', 'ranges', 'seller_cars', 'seller_cars_count'));
    }

    public function AddStock(Request $request)
    {
        $manufacturers = CarMake::get(['name', 'id']);
        $models = CarModel::get(['name', 'id']);
        $ranges = CarRange::get(['name', 'id']);
        $variants = CarModelSeries::get(['name', 'id']); 
        session()->forget('info');

        $manufacturer   = $request->input('manufacturer');
        $model        = $request->input('model');
        $range      = $request->input('range');
        $variant     = $request->input('variant');
        $car = new Car();

        $data_exists = false;


        $car_models = Car::with('CarModel')->get(['model']);   
        $car_ranges = Car::with('CarRange')->get(['range']);
        $car_variants = Car::with('CarModelSeries')->get(['model_series']); 


        if ($manufacturer && $model && $range && $variant) {

            $car = Car::with('carModel', 'carMake', 'carRange', 'carModelSeries', 'carYear')->where(['make' => $manufacturer, 'model_series' => $variant, 'model' => $model, 'range' => $range])->first();

            $exists = CarSeller::where(['car_id' => $car->id, 'seller_id' => auth()->guard('seller')->user()->id])->exists();

            if($exists){
                $data_exists = true;
                Session::flash('info', 'Stock Already added for this Car, Please select another car!'); 
            }

            $car_models = Car::with('CarModel')->where(['make' => $manufacturer])->get(['model']);   
            $car_ranges = Car::with('CarRange')->where(['make' => $manufacturer, 'model' => $model])->get(['range']);
            $car_variants = Car::with('CarModelSeries')->where(['make' => $manufacturer, 'model' => $model, 'range' => $range])->get(['model_series']); 

        }else if ($manufacturer && $model && $range) {

            $car = Car::with('carModel', 'carMake', 'carRange', 'carModelSeries', 'carYear')->where(['make' => $manufacturer, 'model_series' => $range, 'model' => $variant])->first();

            $car_models = Car::with('CarModel')->where(['make' => $manufacturer])->get(['model']);   
            $car_ranges = Car::with('CarRange')->where(['make' => $manufacturer, 'model' => $model])->get(['range']);
            $car_variants = Car::with('CarModelSeries')->where(['make' => $manufacturer, 'model' => $model, 'range' => $range])->get(['model_series']);

        }else if ($manufacturer && $model) {

            $car = Car::with('carModel', 'carMake', 'carRange', 'carModelSeries', 'carYear')->where(['make' => $manufacturer, 'model_series' => $range])->first();

            $car_models = Car::with('CarModel')->where(['make' => $manufacturer])->get(['model']);   
            $car_ranges = Car::with('CarRange')->where(['make' => $manufacturer, 'model' => $model])->get(['range']);
            $car_variants = Car::with('CarModelSeries')->where(['make' => $manufacturer, 'model' => $model])->get(['model_series']);

        }else if ($manufacturer) {

            $car_models = Car::with('CarModel')->where(['make' => $manufacturer])->get(['model']);   
            $car_ranges = Car::with('CarRange')->where(['make' => $manufacturer])->get(['range']);
            $car_variants = Car::with('CarModelSeries')->where(['make' => $manufacturer])->get(['model_series']);         

        }                     

        return view('seller.stock.add-stock', compact('manufacturers', 'variants', 'models', 'ranges', 'car', 'car_models', 'car_ranges', 'car_variants', 'data_exists'));
    }

    public function storeStock(Request $request)
    {
        $request->validate([
            'car_base_price' => ['required']
        ]);

        $input = $request->except('_token');

        $car_seller = carSeller::create($input);

        return redirect()->route('seller.my-stock')->with('success', 'Seller stock created successfully!');
    }

    public function EditStock($id)
    {
        $car_seller = CarSeller::with('car')->where(['id' => $id, 'seller_id' => auth()->user()->id ])->first();
              
        return view('seller.stock.edit-stock', compact('car_seller'));
    }

    public function updateStock($id, Request $request)
    {   
        $request->validate([
            'car_base_price' => ['required']
        ]);

        $input = $request->except('_token');

        $car_seller = carSeller::where(['id' => $id, 'seller_id' => auth()->user()->id ])->update($input);

        return redirect()->route('seller.my-stock')->with('success', 'Seller stock updated successfully!');
    }

    public function deleteStock($id)
    {
        carSeller::where(['car_id' => $id, 'seller_id' => auth()->user()->id ])->delete();

        return redirect()->route('seller.my-stock')->with('success', 'Seller stock deleted successfully!');
    }

    public function importStock(Request $request)
    {
        Excel::import(new SellerStockImport, $request->file);

        return redirect()->route('users.index')->with('success', 'User Imported Successfully');
    }

    public function stockImport()
    {
        return view('seller.stock.import-stock');
    }

    public function downloadSampleFile()
    {
        return response()->download(public_path('csv_file/seller/car_seller.csv'));
    }

    public function postStockImport(Request $request)
    {
        if (isset($request->import_file) && $request->hasFile('import_file')) {

            if ($request->file('import_file')->isValid()) {

                $data = Excel::toArray(new \stdClass(), $request->file('import_file'))[0];     
                                              
                $csv_data_file = CsvData::create([
                        'csv_filename' => $request->file('import_file')->getClientOriginalName(),
                        'csv_header'   => $request->has('header'),
                        'csv_data'     => json_encode($data),
                ]);

                $csv_data = array_slice($data, 0, 2);                      

                return view('seller.stock.import-stock-file', compact('csv_data', 'csv_data_file'));
            }
        }
    }


    public function importProcessData(Request $request)
    {

        $data      = CsvData::find($request->input('csv_data_file_id'));
        $csv_data  = json_decode($data->csv_data, true);

        $db_fields = $request->input('fields');             


        if (is_array($db_fields) && ! in_array('car_variant', $db_fields)) {
            return redirect()->back()->with(['error_msg' => 'Car Variant field is required!']);
        }

        if (is_array($db_fields) && ! in_array('car_make', $db_fields)) {
            return redirect()->back()->with(['error_msg' => 'Car Make field is required!']);
        }

        if (is_array($db_fields) && ! in_array('car_range', $db_fields)) {
            return redirect()->back()->with(['error_msg' => 'Car Range field is required!']);
        }

        if (is_array($db_fields) && ! in_array('car_model', $db_fields)) {
            return redirect()->back()->with(['error_msg' => 'Car Model field is required!']);
        }


        $collection = collect($csv_data)->skip($data->csv_header)->unique(array_keys($db_fields, 'car_model'));

        $collection->chunk(5000)
        ->each(function ($lines) use ($db_fields) {                                                                                            

            $list = [];
            foreach ($lines as $line) {
                $get_data = array_combine($db_fields, $line);                                                                
                          
                unset($get_data['']);
                unset($get_data['--']);

                if (isset($get_data['car_make']) && !empty($get_data['car_make'])) {
                    $make = CarMake::where('name', $get_data['car_make'])->value('id');
                }
                if (isset($get_data['car_model']) && !empty($get_data['car_model'])) {
                    $model = CarModel::where('name', $get_data['car_model'])->value('id');
                }
                if (isset($get_data['car_range']) && !empty($get_data['car_range'])) {
                    $range = CarRange::where('name', $get_data['car_range'])->value('id');
                }  

                if (isset($get_data['car_variant']) && !empty($get_data['car_variant'])) {
                    $variant = CarModelSeries::where('name', $get_data['car_variant'])->value('id');     
                }                        

                $car_id = Car::where(['make' => $make, 'model' => $model, 'range' => $range, 'model_series' => $variant])->value('id'); 

                if (!isset($car_id) && empty($car_id)) {
                   continue;
                }else{
                    $get_data['car_id'] = $car_id;
                    $get_data['seller_id'] = auth()->guard('seller')->user()->id;
                    unset($get_data['car_make']);
                    unset($get_data['car_model']);
                    unset($get_data['car_range']);
                    unset($get_data['car_variant']);
                }                                                                                                                                     

                $list[] = $get_data;
            }  
                                                  

            if ( ! empty($list)) {                    
                CarSeller::insert($list);
            }
        });

        return redirect()->back()->with([
                'status'  => 'success',
                'message' => 'Car Seller Data successfully imported',
        ]);
      
        foreach ($csv_data as $key => $row) {
            if ($key == 0) {
                continue;
            }

            $contact = new Car();
            foreach (config('app.db_fields') as $index => $field) {

                if($field == 'make'){
                    $contact->$field = CarMake::where('name', $row[$index])->value('id');
                }else if($field == 'model'){                          
                    $contact->$field = CarModel::where('name', $row[$index])->value('id');
                }else if($field == 'range'){                                 
                    $contact->$field = CarRange::where('name', $row[$index])->value('id');
                }else if($field == 'model_series'){                               
                    $contact->$field = CarModelSeries::where('name', $row[$index])->value('id');     
                }else{
                    $contact->$field = $row[$index];
                }
            }
                  
            $contact->save();
        }

        return redirect()->back()->with([
                'status'  => 'success',
                'message' => 'Cars Data successfully imported',
        ]);
    }

}
