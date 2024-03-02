<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use App\Models\CarModel;


class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CarModel::truncate();

        $csvFile = fopen(base_path("database/data/carsF.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
                                                          
            if (!$firstline && !empty($data['3'])) {
                CarModel::updateOrCreate(["name" => $data['3']]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
