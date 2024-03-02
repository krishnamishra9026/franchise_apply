<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageManagement;

class PageManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:administrator');
    }

    public function homePage()
    { 
        $page=PageManagement::Where('type','home')->first();
          
        return view('admin.pages.home-page',compact('page'));
    }
    public function aboutPage()
    { 
        $page=PageManagement::Where('type','about')->first();
        return view('admin.pages.about-page',compact('page'));
    }
    public function sellerPage()
    {
        $page=PageManagement::Where('type','seller')->first();

        return view('admin.pages.sellers-page',compact('page'));
    }
    public function buyerPage()
    {
        $page=PageManagement::Where('type','buyer')->first();

        return view('admin.pages.buyers-page',compact('page'));
    }
    public function termsPage()
    {
        $page=PageManagement::Where('type','term')->first();
        return view('admin.pages.terms-page',compact('page'));
    }
    public function privacyPage()
    {
        $page=PageManagement::Where('type','privacy')->first();
        return view('admin.pages.privacy-page',compact('page'));
    }

    public function store(Request $request){

        $request->validate([
            'type'                => ['required'],
            'meta_title'          => ['required'],
            'meta_description'    => ['required'],
        ]);

        $input = $request->except('_token');
        if(PageManagement::Where('type',$request->type)->exists()){

          PageManagement::Where('type',$request->type)->update($input);

        }else{

          PageManagement::create($input);
        }
        
        return redirect()->back()->with('success', 'Page updated successfully');
    }
}

