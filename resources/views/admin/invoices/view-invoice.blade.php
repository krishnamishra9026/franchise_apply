@extends('layouts.admin')
@section('title', 'View Invoice')
@section('content')

<div class="content">
    <!-- Topbar Start -->

    <!-- end Topbar -->

    <div class="container-fluid">
        <div class="card mt-3">
            <div class="card-body">
                <!-- Invoice Logo-->
                <div class="clearfix">
                    <div class="float-start mb-3">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Broker Web" class="img-fluid" style="max-width: 180px">
                    </div>
                    <div class="float-end">
                        <h4 class="m-0">Invoice</h4>
                        <h5 class="m-0 text-muted">Invoice ID #{{ $invoice->id }}</h5>
                    </div>
                </div>

                <!-- Invoice Detail-->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="float-start">
                            <p class="mb-1"><b>Customer Details</b></p>
                            <span class="text-muted font-13"><i class="uil-user me-1"></i>{{ $invoice->order->first_name }} {{ $invoice->order->last_name }}</a></span>
                            <br>
                            <span class="text-muted font-13"><i class="uil-map-pin-alt me-1"></i>{{ $invoice->order->address }}</span>
                            <br>
                            <span class="text-muted font-13"><i class="uil-envelope me-1"></i>{{ $invoice->order->email }}
                                </span>
                            <br>
                            <span class="text-muted font-13"><i class="uil-building me-1"></i>{{ $invoice->order->company_name }}</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="float-start">
                            <p class="mb-1"><b>Delivery details</b></p>
                            <span class="text-muted font-13"><i class="uil-calendar-alt me-1"></i> {{ $invoice->order->delivery_date }}</span>
                            <br>
                            <span class="text-muted font-13"><i class="uil-user me-1"></i> Driver: {{ $invoice->order->driver_name }}</span><br>
                            <span class="text-muted font-13"><i class="uil-map-pin-alt me-1"></i> {{ $invoice->order->address }}, {{ $invoice->order->delivery_address }}</span>
                            <br>
                            <span class="text-muted font-13"><i class="uil-phone me-1"></i> {{ $invoice->order->driver_phone }}</span>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="mt-3 table-responsive">
                    <table class="table table-bordered table-striped table-centered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Vehicle</th>
                            <th style="text-align: right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>{{ $invoice->car->carMake->name }} {{ $invoice->car->carModel->name }} {{ $invoice->car->carRange->name }}</td>
                            <td style="text-align: right">£ {{ $invoice->sub_total }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: right">VAT</td>
                            <td style="text-align: right">£ {{ $invoice->vat }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: right"><h4><strong>Sub total</strong></h4></td>
                            <td style="text-align: right"><h4><strong>£ {{ $invoice->total }}</strong></h4></td>
                        </tr>
                    </tbody>
                </table>
                </div>

                <div class="d-print-none mt-4">
                    <div class="text-end">
                        <!-- onclick="prinDoc();" -->
                        <a href="{{ route('admin.invoices.download', $invoice->id) }}"  class="btn btn-sm btn-secondary"><i class="mdi mdi-printer"></i>
                            Print</a>
                        <a href="{{ route('admin.invoices.index') }}" class="btn btn-sm btn-dark"><i class="mdi mdi-chevron-double-left me-1"></i>
                            Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection