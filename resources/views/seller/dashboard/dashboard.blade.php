@extends('layouts.seller')
@section('title', 'Dashboard')
@section('content')

    <div class="content">
        <!-- Topbar Start -->
        @include('seller.includes.navbar')
        <!-- end Topbar -->

        <div class="container-fluid">
            <div class="mt-3">
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
                                <i class='mdi mdi-thumb-up float-right'></i>
                                <h6 class="text-uppercase mt-0">Accepted Orders</h6>
                                <h2 class="my-2" id="active-users-count">{{ $accepted_orders }}</h2>
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
                                <i class='mdi mdi-truck-delivery float-right'></i>
                                <h6 class="text-uppercase mt-0">Delivered Orders</h6>
                                <h2 class="my-2" id="active-users-count">{{ $delivered_orders }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <h4>My Recent Stock </h4>
                <div class="table-responsive">
                    <table class="table-panel table table-bordered table-centered mb-0">
                        <thead>
                            <tr>
                                <th><strong>UVC</strong></th>
                                <th><strong>Vehicle Description</strong></th>
                                <th><strong>Body</strong></th>
                                <td class="text-center"><strong>Specification</strong></td>
                                <td><strong>Color</strong></td>
                                <td><strong>Model Series</strong></td>
                                <td class="text-center" style="min-width: 120px"><strong>Action</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            @if($seller_cars && count($seller_cars))
                            @foreach($seller_cars as $seller_car)
                            <tr>
                                <td>{{ $seller_car->car->uvc }}</td>
                                <td><a href="{{ route('seller.edit-stock', $seller_car->id) }}">{{ $seller_car->car->carMake->name }} {{ $seller_car->car->carRange->name }}</a></td>
                                <td>{{ $seller_car->car->body_shape }} {{ $seller_car->car->body_style }}</td>
                                <td class="text-center">{{ $seller_car->car->carModel->name }}</td>
                                <td>{{ $seller_car->car_color }}</td>
                                <td>{{ @$seller_car->car->carModelSeries->name }}</td>
                                <td class="text-center" style="min-width: 120px">
                                    <a class="btn btn-primary btn-sm" href="{{ route('seller.edit-stock', $seller_car->id) }}"><i class="dripicons-pencil"></i></a>
                                    <a class="ml-2 btn btn-danger btn-sm" href="{{ route('seller.delete-stock', $seller_car->id) }}"><i class="dripicons-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="9">
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
            <div class="mt-3">
                <h4>Latest Orders</h4>
                <div class="table-responsive">
                    <table class="table-panel table table-bordered table-striped table-centered">
                        <thead>
                            <th class="text-center"><strong>Order ID</strong></th>
                            <th><strong>Created at</strong></th>
                            <th><strong>Vehicle</strong></th>
                            <th class="text-center"><strong>Availability</strong></th>
                            <th><strong>Status</strong></th>
                            <th class="text-center"><strong>Action</strong></th>
                        </thead>
                        <tbody>
                            @if($orders && count($orders))
                            @foreach($orders as $order)
                            <tr>
                                <td class="text-center"><a href="{{ route('seller.orders.show', $order->id) }}">#{{ $order->id }}</a></td>
                                <td>{{ date('F d, Y', strtotime($order->created_at)) }}</td>
                                <td>{{ $order->car->carMake->name }} {{ $order->car->carModel->name }}</td>
                                <td class="text-center">{{ $order->availability }}</td>
                                <td><h4><span class="badge bg-success text-light">{{ getStatus($order->status) }}</span></h4></td>
                                <td class="text-center"><a class="btn btn-primary btn-sm" href="{{ route('seller.orders.show', $order->id) }}"><i class="dripicons-preview"></i></a></td>
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
@endsection
