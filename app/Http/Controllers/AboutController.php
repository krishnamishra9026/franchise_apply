<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageManagement;

class AboutController extends Controller
{
    public function about()
    {
        $page=PageManagement::Where('type','about')->first();
        return view('about-us',compact('page'));
    }
}