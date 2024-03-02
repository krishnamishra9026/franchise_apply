<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use App\Models\CarRange;


class CarRangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CarRange::truncate();

        $csvFile = fopen(base_path("database/data/carsF.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
                                                                                  
            if (!$firstline && !empty($data['2'])) {
                CarRange::updateOrCreate([
                    "name"                     =>    $data['2'],
                ]);    
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
