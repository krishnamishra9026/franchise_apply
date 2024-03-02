<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageManagement;

class TermsController extends Controller
{
    public function terms()
    {
        $page=PageManagement::Where('type','term')->first();
        return view('terms-conditions',compact('page'));
    }
    public function privacy(){
        
        $page=PageManagement::Where('type','privacy')->first();

        return view('privacy',compact('page'));
    }
}