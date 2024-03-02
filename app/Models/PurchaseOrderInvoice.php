<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderInvoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'purchase_order_id',
        'buyer_id',
        'seller_id',
        'car_id',
        'sub_total',
        'total',
        'vat',
        'status',
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

    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'order_id', 'id');
    }
}
