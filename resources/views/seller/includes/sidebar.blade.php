<div class="leftside-menu">

    <!-- LOGO -->
    <a href="{{ route('seller.dashboard') }}" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{ asset('assets/images/sidebar-logo.png') }}" alt="Logo" class="img-fluid">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('assets/images/sidebar-logo.png') }}" alt="Logo" class="img-fluid">
        </span>
    </a>

    <!-- LOGO -->
    <a href="{{ route('seller.dashboard') }}" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="assets/images/logo-dark.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo_sm_dark.png" alt="" height="16">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-item">
                <a href="{{ route('seller.dashboard') }}" class="side-nav-link">
                    <i class="uil-home-alt"></i>                   
                    <span> Dashboard </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('seller.my-stock') }}" class="side-nav-link">
                    <i class="uil-web-grid"></i>                   
                    <span> My Stock </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('seller.orders.index') }}" class="side-nav-link">
                    <i class="uil-store-alt"></i>                   
                    <span> Orders </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('seller.invoices.index') }}" class="side-nav-link">
                    <i class="uil-file-check-alt"></i>                   
                    <span> Invoices </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('seller.inbox') }}" class="side-nav-link">
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
                            <a href="{{ route('seller.password.form') }}">Change Password</a>
                        </li>
                        <li>
                            <a href="{{ route('seller.my-account.edit', Auth::guard('seller')->id()) }}">My Account</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>

</div>
