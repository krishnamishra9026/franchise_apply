@extends('layouts.seller')
@section('title', 'Orders')
@section('content')

<div class="content">
    <!-- Topbar Start -->
    @include('seller.includes.navbar')
    <!-- end Topbar -->

    <div class="container-fluid">
        <div class="card mt-3 mb-3">
            <div class="card-body">
                <form action="{{ route('seller.orders.index') }}">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-label">Order Date</label>
                                <input type="date" name="date" name="filter_date" value="{{ request()->get('filter_date') }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label">Vehicle</label>
                                <input type="text" class="form-control" name="filter_vehicle" value="{{ request()->get('filter_vehicle') }}" placeholder="Vehicle name">
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
                                <a href="{{ route('seller.orders.index') }}" class="btn btn-dark ms-1 mt30">Reset</a>
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
                                @if(getStatus($order->status) == 'Pending')
                                <td><a href="{{ route('seller.orders.update-status', ['id' => $order->id, 'status' => 2]) }}" class="btn btn-success btn-sm">Accept</a> <a href="{{ route('seller.orders.update-status', ['id' => $order->id, 'status' => 4]) }}" class="btn btn-danger btn-sm">Reject</a></td>
                                @else
                                <td>{{ getStatus($order->status) }}</td>
                                @endif

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
                <nav class="mt-3 mb-3 float-right">
                    <ul class="pagination mb-0">
                        {{ $orders->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

@endsection