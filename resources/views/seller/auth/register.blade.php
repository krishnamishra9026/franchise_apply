<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title>Register | Seller</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="favicon.png">

    <!-- App css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet" type="text/css" id="light-style" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  
</head>

<body class="bg-white login-page with-register">

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-7" style="padding:0">
            <p class="go-home greg"><a href="/">< Back to home</a></p>
            <div class="content-right">
                <h1>Create Account</h1>
                <div class="bothUser text-center" style="margin: 30px 0">
                    <a href="{{ route('buyer.register') }}" class="btn btn-outline" style="box-shadow: none">I am a buyer</a>
                    <a href="javascript:void(0)" class="btn btn-success ms-2" style="box-shadow: none">I am a seller</a>
                </div>
                @if ($message = Session::get('message'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong><i class="dripicons-warning me-2"></i> </strong>{{ $message }}
                    </div>
                @endif
                <form method="POST" action="{{ route('seller.register') }}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="firstname" class="control-label mb-1">{{ __('First Name') }}</label>
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus placeholder="First Name">
                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="lastname" class="control-label mb-1">{{ __('Last Name') }}</label>
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus placeholder="Last Name">
                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="control-label mb-1">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email address">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="password" class="control-label mb-1">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"  placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="password-confirm" class="control-label mb-1">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                            </div>
                        </div>
                    </div>
                    <div class="mb-0 text-center">
                        <button type="submit" class="btn btn-success btn-lg" style="box-shadow: none">
                            Create account
                        </button>
                    </div>
                    <div class="mb-3">
                        <p class="dont-account">Already have an account? <a href="{{ route('seller.login') }}">Sign In</a></p>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-5 hidden-xs" style="padding:0">
            <div style="background:#000;min-height: 100vh">
                <div class="mb-3 mdb-3">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="img-fluid" style="max-width: 200px;margin: 0 auto;display:block">
                    <h3>Where Buyers <span style="display:block">meet Sellers</span></h3>
                </div>
                <div class="text-center ctr">
                    <a href="{{route('seller.login')}}" class="btn btn-success btn-lg" style="box-shadow: none">Sign In</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>
