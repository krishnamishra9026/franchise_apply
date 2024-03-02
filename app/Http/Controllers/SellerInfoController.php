<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageManagement;

class SellerInfoController extends Controller
{
    public function sellerInfo()
    {
        $page=PageManagement::Where('type','seller')->first();
        return view('seller-information',compact('page'));
    }
}
