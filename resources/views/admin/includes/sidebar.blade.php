<div class="leftside-menu">

    <!-- LOGO -->
    <a href="{{ route('admin.dashboard') }}" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{ asset('assets/images/sidebar-logo.png') }}" alt="LOGO">
        </span>
        <span class="logo-sm">
            <img src="assets/images/sidebar-logo.png" alt="LOGO">
        </span>
    </a>

    <!-- LOGO -->
    <a href="{{ route('admin.dashboard') }}" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="{{ asset('assets/images/sidebar-logo.png') }}" alt="Logo" class="img-fluid">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('assets/images/sidebar-logo.png') }}" alt="Logo" class="img-fluid">
        </span>

    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="side-nav">
            @can('dashboard')
            <li class="side-nav-item">
                <a href="{{ route('admin.dashboard') }}" class="side-nav-link">
                    <i class="uil-home-alt"></i>                   
                    <span> Dashboard </span>
                </a>
            </li>
            @endcan
            @can('buyers')
            <li class="side-nav-item">
                <a href="{{ route('admin.buyers.index') }}" class="side-nav-link">
                    <i class="uil-users-alt"></i>                   
                    <span> Buyers </span>
                </a>
            </li>
            @endcan
            @can('sellers')
            <li class="side-nav-item">
                <a href="{{ route('admin.sellers.index') }}" class="side-nav-link">
                    <i class="uil-users-alt"></i>                   
                    <span> Sellers </span>
                </a>
            </li>
            @endcan
            @can('stock')
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarStock" aria-expanded="false"
                    aria-controls="sidebarStock" class="side-nav-link">
                    <i class="uil-web-grid"></i> 
                    <span> Stock </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarStock">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('admin.live-stock') }}">Live Stock</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.stock') }}">Master data</a>
                        </li>
                    </ul>
                </div>
            </li>
             @endcan
            @can('orders')
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarOrders" aria-expanded="false"
                    aria-controls="sidebarOrders" class="side-nav-link">
                    <i class="uil-web-grid"></i> 
                    <span> Orders </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarOrders">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('admin.orders.index') }}">Orders</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.purchase-orders') }}">Purchase Orders</a>
                        </li>
                    </ul>
                </div>
            </li>
             @endcan
            @can('invoices')
            <li class="side-nav-item">
                <a href="{{ route('admin.invoices.index') }}" class="side-nav-link">
                    <i class="uil-file-check-alt"></i>                   
                    <span> Invoices </span>
                </a>
            </li>
             @endcan
            @can('inbox')
            <li class="side-nav-item">
                <a href="{{ route('admin.inbox') }}" class="side-nav-link">
                    <i class="uil-message"></i>                   
                    <span> Inbox </span>
                </a>
            </li>
             @endcan
            @can('earnings')
            <li class="side-nav-item">
                <a href="{{ route('admin.earnings') }}" class="side-nav-link">
                    <i class="uil-pound"></i>                   
                    <span> Earnings </span>
                </a>
            </li>
             @endcan
            @can('user-management')
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarUsers" aria-expanded="false"
                    aria-controls="sidebarUsers" class="side-nav-link">
                    <i class="uil-web-grid"></i> 
                    <span> User Management </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarUsers">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('admin.users.index') }}">Users</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.roles.index') }}">Roles</a>
                        </li>
                    </ul>
                </div>
            </li>
             @endcan
             @can('settings')
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false"
                    aria-controls="sidebarPages" class="side-nav-link">
                    <i class="uil-web-grid"></i> 
                    <span> Manage Pages </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPages">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('admin.home-page') }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.sellers-page') }}">Sellers</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.buyers-page') }}">Buyers</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.about-page') }}">About</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.terms-page') }}">Terms and Conditions</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.privacy-page') }}">Privacy Policy</a>
                        </li>
                    </ul>
                </div>
            </li>
            @endcan

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarSettings" aria-expanded="false"
                    aria-controls="sidebarSettings" class="side-nav-link">
                    <i class="uil-cog"></i> 
                    <span> Settings </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarSettings">
                    <ul class="side-nav-second-level">
                        @can('settings')
                        <li>
                            <a href="{{ route('admin.commission') }}">Commission</a>
                        </li>
                        @endcan                             
                        <li>
                            <a href="{{ route('admin.my-account.edit', Auth::guard('administrator')->id()) }}">My Account</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.password.form') }}">Change Password</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        <button class="button-menu-mobile open-left">
            <i class="mdi mdi-menu"></i>
        </button>
        <h4 class="mt-27">@yield('name')</h4>
    </div>

</div>
