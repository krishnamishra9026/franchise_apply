<?php

namespace App\Http\Controllers\Buyer\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Buyer;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:buyer');
    }

    public function changePasswordForm()
    {
        $id         = Auth::guard('administrator')->id();
        $user       = Buyer::find($id);
        return view('buyer.settings.change-password', compact('user'));
    }

    public function changePassword(Request $request)
    {
        $id         = Auth::guard('buyer')->id();

        $this->validate($request, [
            'current_password'      => 'required',
            'new_password'          => 'required|min:8|confirmed',

        ]);

        $user                       = Buyer::find($id);

        if (Hash::check($request->get('current_password'), $user->password)) {

            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect()->route('buyer.password.form')->with('success', 'Password changed successfully!');

        } else {

            return redirect()->back()->with('error', 'Current password is incorrect');
        }

        return redirect()->route('buyer.password.form')->with('success', 'Password changed successfully');
    }

}
