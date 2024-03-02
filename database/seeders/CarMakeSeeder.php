<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use App\Models\CarMake;


class CarMakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CarMake::truncate();

        $csvFile = fopen(base_path("database/data/carsF.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
                                                                                  
            if (!$firstline && !empty($data['1'])) {
                CarMake::updateOrCreate([
                    "name"                     =>    $data['1'],
                ]);    
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
