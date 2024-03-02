<?php

namespace App\Http\Controllers\Seller\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Seller;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:seller');
    }

    public function changePasswordForm()
    {
        $id         = Auth::guard('administrator')->id();
        $user       = Seller::find($id);
        return view('seller.settings.change-password', compact('user'));
    }

    public function changePassword(Request $request)
    {
        $id         = Auth::guard('seller')->id();

        $this->validate($request, [
            'current_password'      => 'required',
            'new_password'          => 'required|min:8|confirmed',

        ]);

        $user                       = Seller::find($id);

        if (Hash::check($request->get('current_password'), $user->password)) {

            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect()->route('seller.password.form')->with('success', 'Password changed successfully!');

        } else {

            return redirect()->back()->with('error', 'Current password is incorrect');
        }

        return redirect()->route('seller.password.form')->with('success', 'Password changed successfully');
    }

}
