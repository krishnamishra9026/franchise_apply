<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SellerVerify extends Model
{
   use HasFactory;

   public $table = "seller_verifies";
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'seller_id',
        'token',
    ];
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function user()
    {
        return $this->belongsTo(Seller::class,'seller_id');
    }
}
