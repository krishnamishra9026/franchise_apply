<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class SellerStockImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
   public function model(array $row)
    {
        return new User([
            "first_name" => $row['first_name'],
            "last_name" => $row['last_name'],
            "email" => $row['email'],
            "mobile_number" => $row['mobile_number'],
            "role_id" => 2, // User Type User
            "status" => 1,
            "password" => Hash::make('password')
        ]);
    }
}
