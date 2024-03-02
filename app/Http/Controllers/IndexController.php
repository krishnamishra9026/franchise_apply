<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageManagement;

class IndexController extends Controller
{
    public function index()
    {
        $page=PageManagement::Where('type','home')->first();
        return view('welcome',compact('page'));
    }

    public function registerSuccess()
    {
        return view('register-success');
    }
}
