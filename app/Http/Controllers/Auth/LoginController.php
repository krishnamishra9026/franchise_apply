<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Buyer;
use App\Models\Seller;
use Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function login(Request $request)
    {

        $this->validate($request, [
            'email'         => 'required|email',
            'password'      => 'required|min:6'
        ]);

        if (Buyer::where('email', $request->email)->exists()) {

            if (Auth::guard('buyer')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

                return redirect()->route('buyer.dashboard');
            } else {

                return $this->sendFailedLoginResponse($request);
            }

        }  else{          

            if (Auth::guard('seller')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
                return redirect()->route('seller.dashboard');

            } else {

                return $this->sendFailedLoginResponse($request);
            }
        }
}

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
