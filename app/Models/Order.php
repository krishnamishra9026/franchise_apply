<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'seller_id',
        'buyer_id',
        'quantity',
        'price',
        'sub_total',
        'vat',
        'total',
        'reference_no',
        'title',
        'first_name',
        'last_name',
        'email',
        'company_name',
        'delivery_date',
        'driver_name',
        'driver_phone',
        'delivery_address',
        'address',
        'city',
        'availability',
        'payment_method',
        'payment_details',
        'postcode',
        'comments',
        'status'
    ];

    public function car()
    {
        return $this->belongsTo('App\Models\Car', 'car_id', 'id');
    }

    public function seller()
    {
        return $this->belongsTo('App\Models\Seller', 'seller_id', 'id');
    }

    public function buyer()
    {
        return $this->belongsTo('App\Models\Buyer', 'buyer_id', 'id');
    }
}
