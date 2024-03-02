@extends('layouts.buyer')
@section('title', 'Order')
@section('content')
<div class="content">
    <!-- Topbar Start -->
    @include('buyer.includes.navbar')
    <!-- end Topbar -->
    
    <div class="container-fluid">
        <div class="card mt-3 mb-3">
            <div class="card-body">
                <form action="{{ route('buyer.orders.index') }}">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="form-label">Order Date</label>
                                <input type="date" name="filter_date" value="{{ request()->get('filter_date') }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-label">Vehicle</label>
                                <input type="text" class="form-control" name="filter_vehicle" value="{{ request()->get('filter_vehicle') }}" placeholder="Vehicle name">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="form-label">Availability</label>
                                <select name="filter_availability" class="form-control">
                                    <option value="">Please select</option>
                                    <option @if(request()->get('filter_availability') == 'On Site') selected @endif value="On Site">On Site</option>
                                    <option @if(request()->get('filter_availability') == 'With Dealer') selected @endif value="With Dealer">With Dealer</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <select name="filter_status" class="form-control">
                                    <option value="">Please select</option>
                                    <option @if(request()->get('filter_status') == '1') selected @endif value="1">Pending</option>
                                    <option @if(request()->get('filter_status') == '2') selected @endif value="2">Accepted</option>
                                    <option @if(request()->get('filter_status') == '3') selected @endif value="3">Completed</option>
                                    <option @if(request()->get('filter_status') == '4') selected @endif value="4">Rejected by dealer</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt30">Filter</button>
                                <a href="{{ route('buyer.orders.index') }}" class="btn btn-dark ms-1 mt30">Reset</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
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
                                <td class="text-center"><a href="{{ route('buyer.view-order') }}">#{{ $order->id }}</a></td>
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
                <div class="col-12 bordertop paginate" style="float: right;">
                    {{ $orders->appends(request()->query())->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection