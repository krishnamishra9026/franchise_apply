@extends('layouts.front')
@section('meta_field')
 <meta name="keywords" content="{{ $page->meta_title }}">
 <meta name="description" content="{{ $page->meta_description }}">
@endsection
@section('content')

<div class="container">
        <div class="seller-page">
                {{-- <div class="page-header">
                        <div class="row">
                                <div class="col-sm-6">
                                        <h1>Manage your stock through a dedicated <span>seller panel</span></h1>
                                </div>
                                <div class="col-sm-6">
                                        <p>Experience effortless efficiency by simplifying your tasks with our services. Whether you utilize a custom-built DMS or manage your inventory through spreadsheets on Excel or Google Docs, we cater to all.</p>
                                </div>
                        </div>
                </div> --}}
                {!! $page->section_1 !!}
                {{-- <h2>All it takes is a CSV file or a live stock feed, and we'll handle the rest.</h2>
                <img src="{{ asset('assets/images/add-stock.png') }}" alt="Add Stock" class="img-fluid" style="border: 3px solid #ccc"> --}}
                {!! $page->section_2 !!}
                {{-- <div class="grow-sales">
                        <div class="row">
                                <div class="col-sm-6">
                                        <h3>Grow your sales</h3>
                                        <p>Streamline your operations by disseminating your inventory to over 500 brokers, insurance firms, and finance companies within seconds. Upload your list weekly or on your preferred schedule, and watch your stock reach a wider audience effortlessly. </p>
                                        <p>Your listings will not only be searchable on our platform but also showcased on any participating broker's website.</p>
                                        <a href="{{ url('seller/register') }}" class="btn btn-primary btn-lg">Sign Up</a>
                                </div>
                                <div class="col-sm-6">
                                        <img src="{{ asset('assets/images/parking-lot.png') }}" alt="Grow your sales" class="img-fluid">
                                </div>
                        </div>
                </div> --}}
                {!! $page->section_3 !!}
               {{--  <div class="we-have">
                        <h4>What we have</h4>
                        <p>We prioritize terms protection to ensure a seamless transaction process. Every buyer must adhere to our standard terms and conditions, including fleet terms specifying eligible buyers, invoicing criteria, and funding procedures. Additionally, we provide an automated system that safeguards your interests. It monitors each vehicle for a month, promptly alerting you if any attempt to alter V5 ownership is detected. This proactive measure helps identify and eliminate unscrupulous buyers from our system, ensuring a secure trading environment for all.</p>
                        <a href="{{ url('seller/register') }}" class="btn btn-primary btn-lg">Become a seller</a>
                </div> --}}
                {!! $page->section_4 !!}
        </div>
</div>

@endsection