<?php

namespace App\Http\Controllers\Buyer\Auth;

use App\Http\Controllers\Controller;
use App\Models\Buyer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class MyAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:buyer');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Buyer $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Buyer $admin)
    {
        $id             = Auth::guard('buyer')->id();
        $admin          = Buyer::find($id);
        $admin->avatar  = isset($admin->avatar) ? asset('storage/uploads/buyer/'.$admin->avatar) : URL::to('assets/images/users/avatar.png') ;
        return view('buyer.settings.my-account', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'firstname'     =>  'required',
            'email'         =>  'required',
        ]);

        $admin                  = Buyer::find($id);
        $admin->firstname       = $request->firstname;
        $admin->lastname        = $request->lastname;
        $admin->email           = $request->email;
        $admin->phone           = $request->phone;

        if($request->hasfile('avatar')){

            $image      = $request->file('avatar');

            $name       = $image->getClientOriginalName();

            $image->storeAs('uploads/buyer/', $name, 'public');

            if(isset($admin->avatar)){

                $path   = 'public/uploads/buyer/'.$admin->avatar;

                Storage::delete($path);

            }

            $admin->avatar = $name;

        }

        $admin->save();

        return redirect()->route('buyer.my-account.edit', $admin->id)->with('success', 'Account updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buyer $admin)
    {
        //
    }
}
