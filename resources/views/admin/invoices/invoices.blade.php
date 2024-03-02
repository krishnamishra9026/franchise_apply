@extends('layouts.admin')
@section('title', 'Invoices')
@section('content')

<div class="content">
    <!-- Topbar Start -->

    <!-- end Topbar -->

    <div class="container-fluid">
        <div class="card mt-3 mb-3">
            <div class="card-body">
                <form action="{{ route('admin.invoices.index') }}">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="form-label">Created at</label>
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
                        <div class="col-sm-2">
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
                                <label class="form-label">Status</label>
                                <select name="filter_status" class="form-control">
                                    <option value="">Please select</option>
                                    <option @if(request()->get('filter_status') == '0') selected @endif value="0">Unpaid</option>
                                    <option @if(request()->get('filter_status') == '1') selected @endif value="1">Paid</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt30">Filter</button>
                                <a href="{{ route('admin.invoices.index') }}" class="btn btn-dark ms-1 mt30">Reset</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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
                            @if($invoices && count($invoices))
                            @foreach($invoices as $invoice)
                            <tr>
                                <td class="text-center"><a href="{{ route('admin.invoices.show', $invoice->id) }}">#{{ $invoice->id }}</a></td>
                                <td>{{ date('F d, Y', strtotime($invoice->created_at)) }}</td>
                                <td>{{ $invoice->buyer->firstname }} {{ $invoice->buyer->lastname }}</td>
                                <td>{{ $invoice->car->carMake->name }} {{ $invoice->car->carModel->name }}</td>
                                <td>{{ $invoice->seller->firstname }} {{ $invoice->seller->lastname }}</td>
                                <td class="text-center">£{{ $invoice->total }}</td>
                                <td><h4><span class="badge bg-success text-light">{{ getInvoiceStatus($invoice->status) }}</span></h4></td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.invoices.show', $invoice->id) }}"><i class="dripicons-preview"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="8">
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
                    {{ $invoices->appends(request()->query())->links('pagination::bootstrap-4') }}
                </div>

            </div>
        </div>
    </div>
</div>

@endsection