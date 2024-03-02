@extends('layouts.buyer')
@section('title', 'Invoices')
@section('content')

<div class="content">
    <!-- Topbar Start -->
    @include('buyer.includes.navbar')
    <!-- end Topbar -->

    <div class="container-fluid">
        <div class="card mt-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-panel table table-bordered table-striped table-centered">
                        <thead>
                            <th class="text-center"><strong>Invoice ID</strong></th>
                            <th><strong>Created at</strong></th>
                            <th><strong>Vehicle</strong></th>
                            <th class="text-center"><strong>Total</strong></th>
                            <th><strong>Status</strong></th>
                            <th class="text-center"><strong>Action</strong></th>
                        </thead>
                        <tbody>
                            @if($invoices && count($invoices))
                            @foreach($invoices as $invoice)
                            <tr>
                                <td class="text-center"><a href="{{ route('buyer.invoices.show', $invoice->id) }}">#{{ $invoice->id }}</a></td>
                                <td>{{ date('F d, Y', strtotime($invoice->created_at)) }}</td>
                                <td>{{ $invoice->car->carMake->name }} {{ $invoice->car->carModel->name }}</td>
                                <td class="text-center">£{{ $invoice->total }}</td>
                                <td><h4><span class="badge bg-success text-light">{{ getInvoiceStatus($invoice->status) }}</span></h4></td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm" href="{{ route('buyer.invoices.show', $invoice->id) }}"><i class="dripicons-preview"></i></a>
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

@endsection