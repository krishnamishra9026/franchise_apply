<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\CarMake;
use App\Models\CarModel;
use App\Models\CarYear;
use App\Models\CarRange;
use App\Models\CarModelSeries;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Car::truncate();

        /*$filesInFolder = \File::files('database/data/cars/');     
        foreach($filesInFolder as $path) { 

            $file = pathinfo($path);

            $csvFile = fopen(base_path("database/data/cars/".$file['basename']), "r");

            $firstline = true;
            while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {

                $caryear = CarMake::where('name', $data['0'])->value('id');                                 
                $carmake = CarMake::where('name', $data['1'])->value('id');                                 
                $carmodel = CarModel::where('name', $data['2'])->value('id');                                 
                if (!$firstline) {
                    Car::updateOrCreate([
                        "year"          => $caryear ?? null,
                        "make"          => $carmake,
                        "model"         => $carmodel,
                        "body_style"    => $data['3']
                    ]);    
                }
                $firstline = false;
            }

            fclose($csvFile);
        }*/

        $csvFile = fopen(base_path("database/data/carsF.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {                  

            $carmake = CarMake::where('name', $data['1'])->value('id');                                 
            $carmodel = CarModel::where('name', $data['3'])->value('id');                                 
            $carrange = CarRange::where('name', $data['2'])->value('id');                                 
            $carmodel_series = CarModelSeries::where('name', $data['5'])->value('id');                                 
            if (!$firstline) {
                Car::updateOrCreate([
                    "uvc"                     =>    $data['0'],
                    "make"                    =>    $carmake,
                    "range"                   =>    $carrange,
                    "model"                   =>    $carmodel,
                    "mark"                    =>    $data['4'],
                    "model_series"            =>    $carmodel_series,
                    "introduction_date"       =>    $data['6'],
                    "start_date"              =>    $data['7'],
                    "end_date"                =>    $data['8'],
                    "fuel_type"               =>    $data['9'],
                    "vehicle_class"           =>    $data['10'],
                    "body_shape"              =>    $data['11'],
                    "body_style"              =>    $data['12'],
                    "number_of_doors"         =>    $data['13'],
                    "gross_vehicle_weight_kg" =>    $data['14'],
                    "power_delivery"          =>    $data['15'],
                    "engine_capacity_cc"      =>    $data['16'],
                    "engine_capacity_litres"  =>    $data['17'],
                    "aspiration"              =>    $data['18'],
                    "kw"                      =>    $data['19'],
                    "bhp"                     =>    $data['20'],
                    "number_of_gears"         =>    $data['21'],
                    "transmission_type"       =>    $data['22'],
                    "drive_type"              =>    $data['23'],
                    "driving_axle"            =>    $data['24'],
                    "battery_capacity"        =>    $data['25'],
                    "vehicle_type"            =>    $data['26'],
                    "model_status"            =>    $data['27'],
                    "vehicles_on_the_road"    =>    $data['28'],
                    "document_version"        =>    $data['29'],
                ]);    
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
