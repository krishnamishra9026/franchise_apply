@extends('layouts.admin')
@section('title', 'Earnings')
@section('content')

<div class="content">
    <!-- Topbar Start -->
    <!-- end Topbar -->

    <div class="container-fluid">
        <h3 class="text-center mt-3">Total commission generated: <strong>£{{ $total_earnings }}</strong></h3>
        <div class="filter mt-3 mb-2" style="clear: both">
            <form action="{{ route('admin.earnings') }}">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="form-label">Date</label>
                            <input type="date" name="filter_date" value="{{ request()->get('filter_date') }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="form-label">Buyer</label>
                            <select data-toggle="select2" name="filter_buyer" value="{{ request()->get('filter_buyer') }}" class="form-control select2">
                                <option value="">Please select</option>
                                @foreach($buyers as $buyer)
                                    <option @if(request()->get('filter_buyer') == $buyer->id) selected @endif value="{{ $buyer->id }}">{{ $buyer->firstname }} {{ $buyer->lastname }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="form-label">Seller</label>
                            <select data-toggle="select2" name="filter_seller" value="{{ request()->get('filter_seller') }}" class="form-control select2">
                                <option value="">Please select</option>
                                @foreach($sellers as $seller)
                                    <option @if(request()->get('filter_seller') == $seller->id) selected @endif value="{{ $seller->id }}">{{ $seller->firstname }} {{ $seller->lastname }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mt30">Filter</button>
                                <a href="{{ route('admin.earnings') }}" class="btn btn-dark ms-1 mt30">Reset</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table-panel table table-bordered table-centered mb-0">
                <thead>
                    <tr>
                        <th><strong>Date</strong></th>
                        <th><strong>Buyer</strong></th>
                        <th><strong>Vehicle</strong></th>
                        <td><strong>Seller</strong></td>
                        <td><strong>Seller Price</strong></td>
                        <td><strong>Sold at</strong></td>
                        <th><strong>Commission Earned</strong></th>
                    </tr>
                </thead>
                <tbody>
                    @if($earnings && count($earnings))
                    @foreach($earnings as $earning)
                    <tr>
                        <td>{{ date('F d, Y', strtotime($earning->created_at)) }}</td>
                        <td>{{ $earning->buyer->firstname }} {{ $earning->buyer->lastname }}</td>
                        <td>{{ $earning->car->carMake->name }} {{ $earning->car->carModel->name }}</td>
                        <td>{{ $earning->seller->firstname }} {{ $earning->seller->lastname }}</td>
                        <td>£{{ $earning->seller_price }}</td>
                        <td>£{{ $earning->sold_price }}</td>
                        <td>£{{ $earning->commission_earned }}</td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="7">
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