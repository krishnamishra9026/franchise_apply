<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class BuyerVerify extends Model
{
   use HasFactory;

   public $table = "buyer_verifies";
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'buyer_id',
        'token',
    ];
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function user()
    {
        return $this->belongsTo(Buyer::class,'buyer_id');
    }
}
