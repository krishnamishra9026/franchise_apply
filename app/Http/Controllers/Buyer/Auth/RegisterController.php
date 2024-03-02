<?php

namespace App\Http\Controllers\Buyer\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Buyer;
use App\Models\BuyerVerify;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Mail; 
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */

    public function showRegistrationForm()
    {
        return view('buyer.auth.register');
    }


    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        return redirect()->route('register-success')->with('success','Registerd sucess')->with('message', $request->email);
    }


    protected function create(array $data)
    {
        $buyer =  Buyer::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $token = Str::random(64);

        BuyerVerify::create([
            'buyer_id' => $buyer->id, 
            'token' => $token
        ]);        

        Mail::send('emails.buyer.emailVerificationEmail', ['token' => $token, 'username' => $data['firstname']], function($message) use($data){
            $message->to($data['email']);
            $message->subject('Email Verification Mail');
        });

        return $buyer;
    }

    public function verifyAccount($token)
    {
        $verifyUser = BuyerVerify::where('token', $token)->first();              

        $message = 'Sorry your email cannot be identified.';

        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Your e-mail has been verified. You can login now .";
            } else {
                $message = "Your e-mail is already verified. You can login now .";
            }
        }

        Auth::guard('buyer')->logout();
        Auth::guard('seller')->logout();
        Auth::guard('administrator')->logout();

        return redirect()->route('buyer.login')->with('message', $message)->with('tab', 1);
    }
}
