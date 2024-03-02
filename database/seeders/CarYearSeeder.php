<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use App\Models\CarYear;


class CarYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CarYear::truncate();

        $csvFile = fopen(base_path("database/data/cars.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
                                                                                  
            if (!$firstline && !empty($data['30'])) {
                CarYear::updateOrCreate([
                    "name"                     =>    $data['30'],
                ]);    
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
