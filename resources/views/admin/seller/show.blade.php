@extends('layouts.admin')
@section('title', 'View Seller')
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
        <h4 class="mt-27">View Seller</h4>
    </div>
    <!-- end Topbar -->

    <div class="container-fluid">
        <ul class="mt-3 nav nav-pills bg-nav-pills nav-justified mb-3">
            <li class="nav-item">
                <a href="#seller" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                    <i class="mdi mdi-home-variant d-md-none d-block"></i>
                    <span class="d-none d-md-block">Seller Info</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#order" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                    <i class="mdi mdi-account-circle d-md-none d-block"></i>
                    <span class="d-none d-md-block">Orders</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#invoice" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                    <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                    <span class="d-none d-md-block">Invoices</span>
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane show active" id="seller">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <h4>{{ $seller->company_name }}</h4>
                                </div>
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <h4>{{ $seller->firstname }} {{ $seller->lastname }}</h4>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <h4>{{ $seller->email }}</h4>
                                </div>
                                <div class="form-group">
                                    <label>Phone number</label>
                                    <h4>{{ $seller->phone }}</h4>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <h4>{{ $seller->address }}</h4>
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <h4>{{ $seller->city }}</h4>
                                </div>
                                <div class="form-group">
                                    <label>Postcode</label>
                                    <h4>{{ $seller->postcode }}</h4>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Joined on</label>
                                    <h4>{{ date('d-m-Y', strtotime($seller->created_at)) }}</h4>
                                </div>
                                <div class="form-group">
                                    <label>Login credentials</label>
                                    <h4>Email : {{ $seller->email }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="order">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table-panel table table-bordered table-striped table-centered">
                                <thead>
                                    <th class="text-center"><strong>Order ID</strong></th>
                                    <th><strong>Created at</strong></th>
                                    <th><strong>Vehicle</strong></th>
                                    <th class="text-center"><strong>Buyer</strong></th>
                                    <th><strong>Status</strong></th>
                                    <th class="text-center"><strong>Action</strong></th>
                                </thead>
                                <tbody>
                                    @foreach($seller->orders as $order)
                                    <tr>
                                        <td class="text-center"><a href="{{ route('admin.orders.show', $order->id) }}">#{{ $order->id }}</a></td>
                                        <td>{{ date('F d, Y', strtotime($order->created_at)) }}</td>
                                        <td>{{ $order->car->carMake->name }} {{ $order->car->carModel->name }}</td>
                                        <td class="text-center">{{ $order->buyer->firstname }} {{ $order->buyer->lastname }}</td>
                                        <td><h4><span class="badge bg-info text-light">{{ getStatus($order->status) }}</span></h4></td>
                                        <td class="text-center">
                                            <a class="btn btn-primary btn-sm" href="{{ route('admin.orders.show', $order->id) }}"><i class="dripicons-preview"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="invoice">
            <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table-panel table table-bordered table-striped table-centered">
                                <thead>
                                    <th class="text-center"><strong>Invoice ID</strong></th>
                                    <th><strong>Created at</strong></th>
                                    <th>Buyer</th>
                                    <th><strong>Vehicle</strong></th>
                                    <th><strong>Seller</strong></th>
                                    <th class="text-center"><strong>Total</strong></th>
                                    <th><strong>Status</strong></th>
                                    <th class="text-center"><strong>Action</strong></th>
                                </thead>
                                <tbody>
                                    @if(($seller->invoices && count($invoices))
                            @foreach(($seller->invoices as $invoice)
                                    <tr>
                                        <td class="text-center"><a href="{{ route('admin.invoices.show', $invoice->id) }}">#{{ $invoice->id }}</a></td>
                                        <td>{{ date('F d, Y', strtotime($invoice->created_at)) }}</td>
                                        <td>John Doe</td>
                                        <td>{{ $invoice->car->carMake->name }} {{ $invoice->car->carModel->name }}</td>
                                        <td>Daniel Fernandes</td>
                                        <td class="text-center">£{{ $invoice->total }}</td>
                                        <td><h4><span class="badge bg-success text-light">{{ getInvoiceStatus($invoice->status) }}</span></h4></td>
                                        <td class="text-center">
                                            <a class="btn btn-primary btn-sm" href="{{ route('admin.invoices.show', $invoice->id) }}"><i class="dripicons-preview"></i></a>
                                        </td>
                                    </tr>
                                     @endforeach
                            @else
                            <tr>
                                <td colspan="6">
                                    <div class="no-data">
                                        <img src="{{ asset('assets/images/icons/no-data.png') }}" alt="No data available" class="img-fluid">
                                        <h3>No data available</h3>
                                        <p>Sorry, The data which you are searching for <br/>is not available at the moment</p>
                                    </div>
                                </td>
                            </tr>
                            @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection