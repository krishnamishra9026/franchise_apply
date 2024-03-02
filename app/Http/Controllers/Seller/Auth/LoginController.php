<?php

namespace App\Http\Controllers\Seller\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:seller')->except('logout');
    }

    public function showLoginForm()
    {
        return view('seller.auth.login');
    }

    public function login(Request $request)
    {

        $this->validate($request, [
            'email'         => 'required|email',
            'password'      => 'required|min:6'
        ]);


        if (Auth::guard('seller')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

            if (!Auth::guard('seller')->user()->is_email_verified) {
                Auth::guard('seller')->logout();
                return redirect()->route('seller.login')
                ->with('message', 'You need to confirm your account. We have sent you an activation code, please check your email.');
            }

            return redirect()->intended(route('seller.dashboard'));
        } else {

            return $this->sendFailedLoginResponse($request);
        }
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {

        if (Auth::guard('seller')->check()) 
        {
            Auth::guard('seller')->logout();
            return redirect()->route('seller.login');
        }
    }
}
