<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CsvData;
use App\Models\CarRange;
use App\Models\CarModel;
use App\Models\CarMake;
use App\Models\CarModelSeries;
use App\Models\Car;
use App\Models\Seller;
use App\Models\CarSeller;
use Maatwebsite\Excel\Facades\Excel;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:administrator');
        $this->middleware(['permission:stock']);
    }

    public function stock(Request $request)
    {
        $filter_manufacturer    = $request->input('filter_manufacturer');
        $filter_model           = $request->input('filter_model');
        $filter_variant         = $request->input('filter_variant');
        $filter_uvc             = $request->input('filter_uvc');

        $manufacturers = CarMake::get(['name', 'id']);
        $variants = CarModel::get(['name', 'id']);
        $models = CarRange::get(['name', 'id']);
        $ranges = CarModelSeries::get(['name', 'id']); 

        $cars = Car::with('carModel', 'carMake', 'carRange', 'carModelSeries', 'carYear')->latest();

        if (isset($request->filter_manufacturer)) {
            $cars->where('make', $request->input('filter_manufacturer'));
        }

        if ($request->filter_model) {
            $cars->where('range', $request->input('filter_model'));
        }

        if ($request->filter_variant) {
            $cars->where('model', $request->input('filter_variant'));
        }     

        if ($request->filter_uvc) {
            $cars->where('uvc', 'LIKE', '%' . $request->input('filter_uvc') . '%');
        }          

        $cars = $cars->paginate(15);    

        return view('admin.stock.stock', compact('cars', 'manufacturers', 'variants', 'models', 'ranges'));
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

        $cars = Car::with('sellers')->has('sellers')->latest();   

        // if (isset($request->filter_manufacturer)) {

        //     $cars->whereHas('car', function ($query) use ($filter_manufacturer) {
        //         $query->where('make', $filter_manufacturer);
        //     });
        // }

        // if ($request->filter_model) {
        //     $cars->whereHas('car', function ($query) use ($filter_model) {
        //         $query->where('range', $filter_model);
        //     });
        // }

        // if ($request->filter_variant) {
        //     $cars->whereHas('car', function ($query) use ($filter_variant) {
        //         $query->where('model', $filter_variant);
        //     });
        // }     

        // if ($request->filter_uvc) {
        //     $cars->whereHas('car', function ($query) use ($filter_uvc) {
        //         $query->where('uvc', 'LIKE', '%' . $filter_uvc . '%');
        //     });
        // } 
        if (isset($request->filter_manufacturer)) {
            $cars->where('make', $request->input('filter_manufacturer'));
        }

        if ($request->filter_model) {
            $cars->where('range', $request->input('filter_model'));
        }

        if ($request->filter_variant) {
            $cars->where('model', $request->input('filter_variant'));
        }     

        if ($request->filter_uvc) {
            $cars->where('uvc', 'LIKE', '%' . $request->input('filter_uvc') . '%');
        }  
        if ($request->filter_model_series) {
            $cars->where('model_series', $request->input('filter_model_series'));
        }              

        $cars = $cars->paginate(15);                                      

        return view('admin.stock.live-stock', compact('manufacturers', 'variants', 'models', 'ranges', 'cars'));
    }

    public function viewStock($id)
    {

        $car = Car::with('carModel', 'carMake', 'carRange', 'carModelSeries', 'carYear')->where('id', $id)->first();     

        return view('admin.stock.view-stock', compact('car'));
    }

    public function viewLiveStock($id, $seller_id)
    {
        $car_seller = CarSeller::with('car')->where(['car_id' => $id, 'seller_id' => $seller_id])->first();

        $car = Car::with('carModel', 'carMake', 'carRange', 'carModelSeries', 'carYear')->where('id',$car_seller->car_id)->first();     

        return view('admin.stock.view-live-stock', compact('car', 'car_seller'));
    }

    public function stockImport($value='')
    {
        return view('admin.stock.import-stock');
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

                return view('admin.stock.import-stock-file', compact('csv_data', 'csv_data_file'));
            }
        }
    }

    public function downloadSampleFile()
    {
        return response()->download(public_path('csv_file/import_file_demo.csv'));
    }

    public function importProcessData(Request $request)
    {

        /*$data = CsvData::find($request->csv_data_file_id);
        $csv_data = json_decode($data->csv_data, true);
        foreach ($csv_data as $row) {
            $contact = new Car();
            foreach (config('app.db_fields') as $index => $field) {
                if ($data->csv_header) {
                    $contact->$field = $row[$request->fields[$field]];
                } else {
                    $contact->$field = $row[$request->fields[$index]];
                }
            }
            $contact->save();
        }

        die();*/


        $data      = CsvData::find($request->input('csv_data_file_id'));
        $csv_data  = json_decode($data->csv_data, true);
        $db_fields = $request->input('fields');

        if (is_array($db_fields) && ! in_array('uvc', $db_fields)) {
            return redirect()->back()->with(['error_msg' => 'uvc field is required!']);
        }

        if (is_array($db_fields) && ! in_array('make', $db_fields)) {
            return redirect()->back()->with(['error_msg' => 'make field is required!']);
        }

        if (is_array($db_fields) && ! in_array('range', $db_fields)) {
            return redirect()->back()->with(['error_msg' => 'range field is required!']);
        }

        if (is_array($db_fields) && ! in_array('model', $db_fields)) {
            return redirect()->back()->with(['error_msg' => 'model field is required!']);
        }

        if (is_array($db_fields) && ! in_array('model_series', $db_fields)) {
            return redirect()->back()->with(['error_msg' => 'model_series field is required!']);
        }


        $collection = collect($csv_data)->skip($data->csv_header)->unique(array_keys($db_fields, 'phone'));

        $collection->chunk(5000)
        ->each(function ($lines) use ($db_fields) {                                            

            $list = [];
            foreach ($lines as $line) {
                $get_data = array_combine($db_fields, $line);
                          
                unset($get_data['']);
                unset($get_data['--']);

                if (isset($get_data['make']) && !empty($get_data['make'])) {
                    $get_data['make'] = CarMake::where('name', $get_data['make'])->value('id');
                }
                if (isset($get_data['model']) && !empty($get_data['model'])) {
                    $get_data['model'] = CarModel::where('name', $get_data['model'])->value('id');
                }
                if (isset($get_data['range']) && !empty($get_data['range'])) {
                    $get_data['range'] = CarRange::where('name', $get_data['range'])->value('id');
                }
                if (isset($get_data['model_series']) && !empty($get_data['model_series'])) {
                    $get_data['model_series'] = CarModelSeries::where('name', $get_data['model_series'])->value('id');     
                }                                                          

                $list[] = $get_data;
            }                  

            if ( ! empty($list)) {                    
                Car::insert($list);
            }
        });

        return redirect()->back()->with([
                'status'  => 'success',
                'message' => 'Cars Data successfully imported',
        ]);


       /* if (is_array($db_fields) && ! in_array('phone', $db_fields)) {
            return redirect()->route('customer.contacts.show', $contact->uid)->with([
                    'status'  => 'error',
                    'message' => __('locale.filezone.phone_number_column_require'),
            ]);
        }*/

        /*foreach (config('app.db_fields') as $index => $field) {
            $contact->$field = $row[$request->fields[$index]];
        }*/
      
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

    public function stockDelete($id)
    {
        Car::where('id', $id)->delete();
        $car_seller_exists = CarSeller::where('car_id', $id)->exists();
        if ($car_seller_exists) {
            return redirect()->route('admin.stock')->with('warning', 'Stock already assigned to a seller, you can not delete this Car!');
        }
        return redirect()->route('admin.stock')->with('success', 'Stock deleted successfully');
    }
}
