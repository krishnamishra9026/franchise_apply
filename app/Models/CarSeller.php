<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarSeller extends Model
{
    use HasFactory;

    protected $table = 'car_seller';

    protected $fillable = [
        'car_id',
        'seller_id',
        'car_color',
        'car_base_price',
        'car_road_tax',
        'car_registration_fee',
        'car_delivery_charge',
    ];

    public function car()
    {
        return $this->belongsTo('App\Models\Car', 'car_id', 'id');
    }

    public function seller()
    {
        return $this->belongsTo('App\Models\Seller', 'seller_id', 'id');
    }
}
