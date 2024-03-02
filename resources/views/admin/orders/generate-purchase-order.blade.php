@extends('layouts.admin')
@section('title', 'Purchase Order')
@section('content')

<div class="content">
    <!-- Topbar Start -->
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
                                <a href="javascript: void(0);" class="text-dark">
                                    <small>Clear All</small>
                                </a>
                            </span>Notification
                        </h5>
                    </div>

                    <div style="max-height: 230px;" data-simplebar>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-primary">
                                <i class="mdi mdi-comment-account-outline"></i>
                            </div>
                            <p class="notify-details">Caleb Flakelar commented on Admin
                                <small class="text-muted">1 min ago</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-info">
                                <i class="mdi mdi-account-plus"></i>
                            </div>
                            <p class="notify-details">New user registered.
                                <small class="text-muted">5 hours ago</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon">
                                <img src="{{ asset('assets/images/users/avatar-2.jpg') }}" class="img-fluid rounded-circle" alt="" /> </div>
                            <p class="notify-details">Cristina Pride</p>
                            <p class="text-muted mb-0 user-msg">
                                <small>Hi, How are you? What about our next meeting</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-primary">
                                <i class="mdi mdi-comment-account-outline"></i>
                            </div>
                            <p class="notify-details">Caleb Flakelar commented on Admin
                                <small class="text-muted">4 days ago</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon">
                                <img src="{{ asset('assets/images/users/avatar-4.jpg') }}" class="img-fluid rounded-circle" alt="" /> </div>
                            <p class="notify-details">Karen Robinson</p>
                            <p class="text-muted mb-0 user-msg">
                                <small>Wow ! this admin looks good and awesome design</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-info">
                                <i class="mdi mdi-heart"></i>
                            </div>
                            <p class="notify-details">Carlos Crouch liked
                                <b>Admin</b>
                                <small class="text-muted">13 days ago</small>
                            </p>
                        </a>
                    </div>

                    <!-- All-->
                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
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
                        <span class="account-user-name">Dominic Keller</span>
                        <span class="account-position">Founder</span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                    <!-- item-->
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-circle me-1"></i>
                        <span>My Account</span>
                    </a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="mdi mdi-logout me-1"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>

        </ul>
        <button class="button-menu-mobile open-left">
            <i class="mdi mdi-menu"></i>
        </button>
        <h4 class="mt-27">Purchase Order</h4>
    </div>
    <!-- end Topbar -->

    <div class="container-fluid">
        <h4 class="mt-3">Order ID: #{{ $id }}</h4>
        <div class="card">
            <form method="POST" action="{{ route('admin.orders.update', $order->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table-panel table table-bordered table-centered mb-0">
                            <thead>
                                <th>Quantity</th>
                                <th>Vehicle</th>
                                <th>Assign Seller</th>
                                <th>Model</th>
                                <th>Price</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" name="quantity" value="{{ $order->quantity }}" class="form-control" required placeholder="Quantity"></td>
                                    <td>{{ $order->car->carMake->name }} {{ $order->car->carModel->name }}</td>
                                    <td>
                                    <select class="form-control select2" name="seller_id" required data-toggle="select2">
                                        <option value="">Please Select</option>
                                        @foreach($sellers as $seller)
                                        <option @if( $order->seller_id == $seller->id) selected @endif value="{{ $seller->id }}">{{ $seller->firstname }} {{ $seller->lastname }}</option>
                                    @endforeach
                                    </select>
                                    </td>
                                    <td>{{ $order->car->carRange->name }}</td>
                                    <td>{{ $order->price }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="mt-2">
                            <h4>Delivery details</h4>
                            <ul class="list-unstyled">
                                <li>Delivery date: <strong>{{ $order->delivery_date }}</strong></li>
                                <li>Driver Name: <strong>{{ $order->driver_name }}</strong></li>
                                <li>Driver Phone: <strong>{{ $order->driver_phone }}</strong></li>
                                <li>Delivery Address: <strong>{{ $order->delivery_address }}</strong></li>
                                <li>Address: <strong>{{ $order->address }}</strong></li>
                            </ul>
                            <div class="mt-2"><button class="btn btn-primary">Generate PO</button></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection