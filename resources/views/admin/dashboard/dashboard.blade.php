@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')

<div class="content">
     <!-- start page title -->
     <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">                        
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">
            <div class="card tilebox-one">
                <div class="card-body">
                    <i class='mdi mdi-cart float-right'></i>
                    <h6 class="text-uppercase mt-0">New Orders</h6>
                    <h2 class="my-2" id="active-users-count">{{ $new_orders }}</h2>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card tilebox-one">
                <div class="card-body">
                    <i class='uil-store-alt float-right'></i>
                    <h6 class="text-uppercase mt-0">PO Created</h6>
                    <h2 class="my-2" id="active-users-count">{{ $po_created }}</h2>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card tilebox-one">
                <div class="card-body">
                    <i class='mdi mdi-thumb-down float-right'></i>
                    <h6 class="text-uppercase mt-0">Rejected Orders</h6>
                    <h2 class="my-2" id="active-users-count">{{ $rejected_orders }}</h2>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card tilebox-one">
                <div class="card-body">
                    <i class='mdi mdi-account-multiple float-right'></i>
                    <h6 class="text-uppercase mt-0">Total Sellers</h6>
                    <h2 class="my-2" id="active-users-count">{{ $total_seller }}</h2>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card tilebox-one">
                <div class="card-body">
                    <i class='mdi mdi-account-multiple-outline float-right'></i>
                    <h6 class="text-uppercase mt-0">Total Buyers</h6>
                    <h2 class="my-2" id="active-users-count">{{ $total_buyer }}</h2>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card tilebox-one">
                <div class="card-body">
                    <i class='uil-pound float-right'></i>
                    <h6 class="text-uppercase mt-0">Commission Earned</h6>
                    <h2 class="my-2" id="active-users-count">£ {{ $total_earning }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <h4>Latest orders received</h4>
        <div class="table-responsive">
            <table class="table-panel table table-bordered table-striped table-centered">
                <thead>
                    <th class="text-center"><strong>Order ID</strong></th>
                    <th><strong>Customer</strong></th>
                    <th><strong>Created at</strong></th>
                    <th><strong>Vehicle</strong></th>
                    <th><strong>Status</strong></th>
                    <th class="text-center"><strong>Action</strong></th>
                </thead>
                <tbody>
                    @if($orders && count($orders))
                    @foreach($orders as $order)
                    <tr>
                        <td class="text-center"><a href="#">#{{ $order->id }}</a></td>
                        <td>{{ $order->buyer->firstname }} {{ $order->buyer->lastname }}</td>
                        <td>{{ date('F d, Y', strtotime($order->created_at)) }}</td>
                        <td>{{ $order->car->carMake->name }} {{ $order->car->carModel->name }}</td>
                        <td><h4><span class="badge bg-danger text-light">{{ getStatus($order->status) }}</span></h4></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-light dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('admin.orders.show', $order->id) }}">View order</a>
                                <a class="dropdown-item" href="{{ route('admin.generate-purchase-order', $order->id) }}">Generate PO</a>
                                @if(getStatus($order->status) == 'Pending')
                                <a class="dropdown-item" href="{{ route('admin.orders.update-status',['id' => $order->id, 'status' => 2]) }}">Accepted</a>
                                <a class="dropdown-item" href="{{ route('admin.orders.update-status', ['id' => $order->id, 'status' => 4]) }}">Reject</a>
                                @endif
                            </div>
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
@endsection
