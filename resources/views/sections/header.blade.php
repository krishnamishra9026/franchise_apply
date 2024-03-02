
<!-- DESKTOP HEADER -->
<header class="desktop-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                <div class="logo">
                    <a href="/"><img src="{{ asset('assets/images/logo-minimized.png') }}" alt="Broker Web" class="img-fluid"></a>
                </div>
            </div>
            <div class="col-sm-7">
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="/">Home</a></li>
                    <li class="list-inline-item"><a href="{{ url('seller-information')}}">Sellers</a></li>
                    <li class="list-inline-item"><a href="{{ url('buyer-information')}}">Buyers</a></li>
                    <li class="list-inline-item"><a href="{{ url('about-us')}}">About</a></li>
                    <li class="list-inline-item"><a href="#">Blogs</a></li>
                    <li class="list-inline-item"><a href="{{ url('customer-support')}}">Support</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <ul class="header-right list-inline">
                    <li class="list-inline-item"><a class="btn btn-primary" href="{{ route('buyer.login')}}">Sign In</a></li>
                    <li class="list-inline-item"><a class="btn btn-secondary" href="{{ route('seller.register')}}">Sign Up</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>

<!-- MOBILE HEADER -->
<header class="mobile-menu">
    <div class="container">
        <div class="row">
            <div class="col-7">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('assets/images/logo-minimized.png') }}" alt="Broker web" class="img-fluid">
                </a>
            </div>
            <div class="col-5 pl-0">
                <div class="m-triger float-right">
                    <a class="navbar-toggle" type="button" class="openbtn" onclick="openNav()" href="javascript:openMMenu();">
                        <span class="oi oi-menu"></span> <img src="{{ asset ('assets/images/icons/hamburger.png') }}" alt="" class="img-fluid">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--Menu-->
    <div id="mySidebar">
        <nav id="menu">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="{{ url('seller-information')}}">Sellers</a></li>
                <li><a href="{{ url('buyer-information')}}">Buyers</a></li>
                <li><a href="{{ url('about-us')}}">About Us</a></li>
                <li><a href="{{ url('about-us')}}">Blogs</a></li>
                <li><a href="{{ url('customer-support')}}">Support</a></li>
                <li><a style="color: #c73d15 !important" href="{{ route('buyer.login') }}">Sign In</a></li>
            </ul>
        </nav>
    </div>
</header>