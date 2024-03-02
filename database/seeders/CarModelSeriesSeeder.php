<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use App\Models\CarModelSeries;


class CarModelSeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CarModelSeries::truncate();

        $csvFile = fopen(base_path("database/data/carsF.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
                                                                                  
            if (!$firstline && !empty($data['5'])) {
                CarModelSeries::updateOrCreate([
                    "name"                     =>    $data['5'],
                ]);    
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
