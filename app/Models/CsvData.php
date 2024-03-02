<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static find(mixed $csv_data_file_id)
 */
class CsvData extends Model
{

    protected $fillable = [
            'csv_filename',
            'csv_header',
            'csv_data',
    ];
}
