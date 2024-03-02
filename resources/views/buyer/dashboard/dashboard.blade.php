@extends('layouts.buyer')
@section('title', 'Dashboard')
@section('content')

<div class="content">

        <!-- Topbar Start -->
        @include('buyer.includes.navbar')
        <!-- end Topbar -->

        <!-- Start Content-->
        <div class="container-fluid">
            <h4 class="mt-4">Orders</h4>
            <div class="row">
                <div class="col-12">
                    <div class="card widget-inline">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-sm-6 col-xl-3">
                                    <div class="card shadow-none m-0">
                                        <div class="card-body text-center">
                                            <i class="dripicons-briefcase text-muted" style="font-size: 24px;"></i>
                                            <h3><span>{{ $new_orders }}</span></h3>
                                            <p class="text-muted font-15 mb-0">Pending Orders</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xl-3">
                                    <div class="card shadow-none m-0 border-start">
                                        <div class="card-body text-center">
                                            <i class="dripicons-cross text-muted" style="font-size: 24px;"></i>
                                            <h3><span>{{ $rejected_orders }}</span></h3>
                                            <p class="text-muted font-15 mb-0">Rejected Orders</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xl-3">
                                    <div class="card shadow-none m-0 border-start">
                                        <div class="card-body text-center">
                                            <i class="dripicons-checkmark text-muted" style="font-size: 24px;"></i>
                                            <h3><span>{{ $accepted_orders }}</span></h3>
                                            <p class="text-muted font-15 mb-0">Accepted Orders</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xl-3">
                                    <div class="card shadow-none m-0 border-start">
                                        <div class="card-body text-center">
                                            <i class="dripicons-thumbs-up text-muted" style="font-size: 24px;"></i>
                                            <h3><span>{{ $delivered_orders }}</span></h3>
                                            <p class="text-muted font-15 mb-0">Delivered Orders</p>
                                        </div>
                                    </div>
                                </div>

                            </div> <!-- end row -->
                        </div>
                    </div> <!-- end card-box-->
                </div> <!-- end col-->
            </div>
            <!-- end row-->

            <h4>My Orders</h4>
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
                            <td class="text-center"><a href="{{ route('buyer.orders.show', $order->id) }}">#{{ $order->id }}</a></td>
                            <td>{{ date('F d, Y', strtotime($order->created_at)) }}</td>
                            <td>{{ $order->car->carMake->name }} {{ $order->car->carModel->name }}</td>
                            <td class="text-center">{{ $order->availability }}</td>
                            <td><h4><span class="badge bg-success text-light">{{ getStatus($order->status) }}</span></h4></td>
                            <td class="text-center"><a class="btn btn-primary btn-sm" href="{{ route('buyer.orders.show', $order->id) }}"><i class="dripicons-preview"></i></a></td>
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

            
        </div> <!-- container -->

    </div> <!-- content -->

<!-- Footer Start -->
<footer class="footer">
    <div class="container-fluid">
        <div>
            <script>document.write(new Date().getFullYear())</script> © Trading Platform
        </div>
    </div>
</footer>
<!-- end Footer -->


@endsection
