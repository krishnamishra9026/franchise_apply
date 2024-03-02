<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageManagement;

class BuyerInfoController extends Controller
{
    public function buyerInfo()
    {
        $page=PageManagement::Where('type','buyer')->first();
        return view('buyer-information',compact('page'));
    }
}