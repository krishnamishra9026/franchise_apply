<div class="leftside-menu">

    <!-- LOGO -->
    <a href="{{ route('buyer.dashboard') }}" class="logo text-center logo-light" style="color:#fff">
        <img src="{{ asset('assets/images/sidebar-logo.png') }}" alt="Logo" class="img-fluid">
    </a>

    <!-- LOGO -->
    <a href="{{ route('buyer.dashboard') }}" class="logo text-center logo-dark" style="color:#fff">
        <img src="{{ asset('assets/images/sidebar-logo.png') }}" alt="Logo" class="img-fluid">
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-item">
                <a href="{{ route('buyer.dashboard') }}" class="side-nav-link">
                    <i class="uil-home-alt"></i>                   
                    <span> Dashboard </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('buyer.liveStock') }}" class="side-nav-link">
                    <i class="uil-web-grid"></i>                   
                    <span> Live stock </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('buyer.vehicle-search') }}" class="side-nav-link">
                    <i class="uil-search-alt"></i>                   
                    <span> Vehicle Search </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('buyer.orders.index') }}" class="side-nav-link">
                    <i class="uil-store-alt"></i>                   
                    <span> Orders </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('buyer.invoices.index') }}" class="side-nav-link">
                    <i class="uil-file-check-alt"></i>                   
                    <span> Invoices </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('buyer.inbox') }}" class="side-nav-link">
                    <i class="uil-message"></i>                   
                    <span> Inbox </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarSettings" aria-expanded="false"
                    aria-controls="sidebarSettings" class="side-nav-link">
                    <i class="uil-cog"></i> 
                    <span> Settings </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarSettings">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('buyer.password.form') }}">Change Password</a>
                        </li>
                        <li>
                            <a href="{{ route('buyer.my-account.edit', Auth::guard('buyer')->id()) }}">My Account</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>

</div>
