<?php

namespace App\Http\Controllers\Buyer\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:buyer')->except('logout');
    }

    public function showLoginForm()
    {
        return view('buyer.auth.login');
    }

    public function login(Request $request)
    {

        $this->validate($request, [
            'email'         => 'required|email',
            'password'      => 'required|min:6'
        ]);


        if (Auth::guard('buyer')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

            if (!Auth::guard('buyer')->user()->is_email_verified) {
                Auth::guard('buyer')->logout();
                return redirect()->route('buyer.login')
                ->with('message', 'You need to confirm your account. We have sent you an activation code, please check your email.');
            }

            return redirect()->intended(route('buyer.dashboard'));
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

        if (Auth::guard('buyer')->check()) 
        {
            Auth::guard('buyer')->logout();
            return redirect()->route('buyer.login');
        }
    }
}
