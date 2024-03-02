<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title>Login | Seller</title>
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

<body class="bg-white login-page">

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4 hidden-xs" style="padding:0">
            <div style="background:#000;min-height: 100vh">
                <div class="mb-3 mdb-3">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="img-fluid" style="max-width: 200px;margin: 0 auto;display:block">
                    <h3>Where Buyers <span style="display:block">meet Sellers</span></h3>
                </div>
                <div class="text-center ctr">
                    <a href="{{route('seller.register')}}" class="btn btn-success btn-lg" style="box-shadow: none">Create a seller account</a>
                </div>
            </div>
        </div>
        <div class="col-sm-8" style="padding:0">
        <p class="go-home"><a href="/">< Back to home</a></p>
            <div class="content-right">
                <h1>Seller Login</h1>
                <div class="bothUser text-center" style="margin: 30px 0">
                    <a href="{{ route('buyer.login')}}" class="btn btn-outline">I am a buyer</a>
                    <a href="javascript:void(0)" class="btn btn-success ms-2">I am a seller</a>
                </div>

                @if ($message = Session::get('message'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong><i class="dripicons-warning me-2"></i> </strong>{{ $message }}
                    </div>
                @endif
                
                <form method="POST" action="{{ route('seller.login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input id="email" type="email"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" autocomplete="email" autofocus>
                        @error('email')
                            <code id="email-error" class="text-danger">{{ $message }}</code>
                        @enderror
                    </div>
                    <div class="mb-3">

                            <a href="{{ route('seller.password.request') }}" class="text-muted float-end"><small>Forgot
                                    your password?</small></a>

                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            autocomplete="current-password">
                        @error('password')
                            <code id="password-error" class="text-danger">{{ $message }}</code>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}
                                class="form-check-input" id="checkbox-signin">
                            <label class="form-check-label" for="checkbox-signin">Remember me</label>
                        </div>
                    </div>
                    <div class="d-grid mb-0 text-center">
                        <button class="btn btn-success btn-userlogin" type="submit">Log In</button>
                    </div>
                    <div class="mb-3">
                        <p class="dont-account">Don't have a seller account? <a href="{{ route('seller.register') }}">Create Now</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>

</html>
