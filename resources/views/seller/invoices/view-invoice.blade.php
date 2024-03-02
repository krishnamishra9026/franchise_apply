@extends('layouts.seller')
@section('title', 'Invoice details')
@section('content')

<!-- Topbar Start -->
    @include('seller.includes.navbar')
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
                                <td>Renault Trafic SL30 Blue dCi 130PS Start Panel Van</td>
                                <td style="text-align: right">£ 19,041.33</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="text-align: right">VAT</td>
                                <td style="text-align: right">£ 3,755.27</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="text-align: right"><h4><strong>Sub total</strong></h4></td>
                                <td style="text-align: right"><h4><strong>£22,796.60</strong></h4></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="d-print-none mt-4">
                    <div class="text-end">
                        <a href="{{ route('seller.invoices.download', $invoice->id) }}"  class="btn btn-sm btn-secondary"><i class="mdi mdi-printer"></i>
                            Print</a>
                        <a href="{{ route('seller.invoices.index') }}" class="btn btn-sm btn-dark"><i class="mdi mdi-chevron-double-left me-1"></i>
                            Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection