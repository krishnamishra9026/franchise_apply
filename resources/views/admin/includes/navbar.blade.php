<div class="navbar-custom">
        <ul class="list-unstyled topbar-menu float-end mb-0">
            

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="dripicons-bell noti-icon"></i>
                    <span class="noti-icon-badge"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg">


                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="m-0">
                            <span class="float-end">
                                 @if (auth()->guard('administrator')->user()->unreadNotifications && count(auth()->guard('administrator')->user()->unreadNotifications))
                                <a href="{{route('admin.mark-as-read')}}" class="text-dark" >
                                    <small>Clear All</small>
                                </a>
                                @endif
                            </span>Notification
                        </h5>
                    </div>

                    <div style="max-height: 230px;" data-simplebar>
                        <!-- item-->
                        @if(auth()->guard('administrator')->user()->unreadNotifications  && count(auth()->guard('administrator')->user()->unreadNotifications))
                        @foreach (auth()->guard('administrator')->user()->unreadNotifications as $notification)
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-primary">
                                <i class="mdi mdi-comment-account-outline"></i>
                            </div>
                            <p class="notify-details">{!! $notification->data['data'] !!}<br>
                                <small class="text-muted">{{ $notification->created_at }}</small>
                            </p>
                        </a>
                        @endforeach
                        @else
                        <div>No data</div>
                        @endif

                        @foreach (auth()->guard('administrator')->user()->readNotifications as $notification)
                        <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-primary">
                                <i class="mdi mdi-comment-account-outline"></i>
                            </div>
                            <p class="notify-details">{!! $notification->data['data'] !!}
                                <small class="text-muted">{{ $notification->created_at }}</small>
                            </p>
                        </a> -->
                        @endforeach

                       

                    <!-- All-->
                    <a style="display: none;" href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                        View All
                    </a>

                </div>
            </li>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                    aria-expanded="false">
                    <span class="account-user-avatar"> 
                        <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="user-image" class="rounded-circle">
                    </span>
                    <span>
                        <span class="account-user-name">{{ Auth::guard('administrator')->user()->firstname }}
                        {{ Auth::guard('administrator')->user()->lastname }}</span>
                        <span class="account-position">Administrator</span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                    <!-- item-->
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                    <a href="{{ route('admin.my-account.edit', Auth::guard('administrator')->id()) }}" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-circle me-1"></i>
                        <span>My Account</span>
                    </a>
                    <!-- item-->
                    <a href="{{ route('admin.logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item notify-item">
                        <i class="mdi mdi-logout me-1"></i>
                        <span>Logout</span>
                    </a>

                    <form id="logout-form"
                    action="{{ 'App\Models\Administrator' == Auth::getProvider()->getModel() ? route('admin.logout') : route('admin.logout') }}"
                    method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>

                </div>
            </li>

        </ul>
        <button class="button-menu-mobile open-left">
            <i class="mdi mdi-menu"></i>
        </button>

        @php
            $segmentData = ucwords(str_replace('-', ' ', request()->segment(2)));
            if(empty($segmentData)){
                $segmentData = 'Dashboard';
            }
            @endphp
            
            <h4 class="mt-27">@yield('topBarMenu', $segmentData)</h4>
    </div>