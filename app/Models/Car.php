<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'uvc', 'make', 'range', 'model', 'mark', 'model_series', 'introduction_date', 'start_date', 'end_date', 'fuel_type', 'vehicle_class', 'body_shape', 'body_style', 'number_of_doors', 'gross_vehicle_weight_kg', 'power_delivery', 'engine_capacity_cc', 'engine_capacity_litres', 'aspiration', 'kw', 'bhp', 'number_of_gears', 'transmission_type', 'drive_type', 'driving_axle', 'battery_capacity', 'vehicle_type', 'model_status', 'vehicles_on_the_road', 'document_version', 'year'
    ];

    public function carModel()
    {
        return $this->belongsTo('App\Models\CarModel', 'model', 'id');
    }

    public function carMake()
    {
        return $this->belongsTo('App\Models\CarMake', 'make', 'id');
    }

    public function carRange()
    {
        return $this->belongsTo('App\Models\CarRange', 'range', 'id');
    }

    public function carModelSeries()
    {
        return $this->belongsTo('App\Models\CarModelSeries', 'model_series', 'id');
    }
    public function carYear()
    {
        return $this->belongsTo('App\Models\CarYear', 'year', 'id');
    }

    public function sellers()
    {
        return $this->belongsToMany(Seller::class);
    }

}
