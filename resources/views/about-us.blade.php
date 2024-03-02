@extends('layouts.front')
@section('meta_field')
 <meta name="keywords" content="{{ $page->meta_title }}">
 <meta name="description" content="{{ $page->meta_description }}">
@endsection
@section('content')

{{-- <div class="about-banner">
        <div class="container-fluid">
                <h1>About Us</h1>
                <p>Brokerweb is a straight forward and user-friendly software designed to facilitate vehicle trading for both buyers and sellers</p>
                <a href="{{ url('customer-support')}}" class="btn btn-primary btn-lg">Get in touch</a>     
        </div>
</div> --}}
{!! $page->section_1 !!}
<div class="container">
        {{-- <div class="about-us">
                <h2 class="text-center">Trade <span style="color:#c73d15">Buyers</span> Features and Benefits</h2>
                <div class="row">
                        <div class="col-sm-3">
                                <div class="box">
                                        <img src="{{ asset('assets/images/icons/sedan.png') }}" alt="Live Vehicle Stock" class="img-fluid">
                                        <h5>Live Vehicle Stock</h5>
                                        <p>Access real-time vehicle stock directly on your website</p>
                                </div>
                        </div>
                        <div class="col-sm-3">
                                <div class="box">
                                        <img src="{{ asset('assets/images/icons/finder.png') }}" alt="Dedicated Website for Stock Search" class="img-fluid">
                                        <h5>Dedicated Website for Stock Search</h5>
                                        <p>Easily search for available stock through a dedicated website</p>
                                </div>
                        </div>
                        <div class="col-sm-3">
                                <div class="box">
                                        <img src="{{ asset('assets/images/icons/price-label.png') }}" alt="Transparent Pricing" class="img-fluid">
                                        <h5>Transparent Pricing</h5>
                                        <p>Prices are clearly displayed for each vehicle</p>
                                </div>
                        </div>
                        <div class="col-sm-3">
                                <div class="box">
                                        <img src="{{ asset('assets/images/icons/convenient.png') }}" alt="Convenient Purchase Process" class="img-fluid">
                                        <h5>Convenient Purchase Process</h5>
                                        <p>When a purchase is made, invoicing can be handled directly through Brokerweb, either to you or your funder</p>
                                </div>
                        </div>
                        <div class="col-sm-3">
                                <div class="box">
                                        <img src="{{ asset('assets/images/icons/deal.png') }}" alt="Single Point of Contact" class="img-fluid">
                                        <h5>Single Point of Contact</h5>
                                        <p>Deal directly with Brokerweb for all transactions, simplifying the process and reducing complexity</p>
                                </div>
                        </div>
                </div>
                <h2 class="text-center second-h2">Trade <span style="color:#c73d15">Sellers</span> Features and Benefits</h2>
                <div class="row">
                        <div class="col-sm-3">
                                <div class="box">
                                        <img src="{{ asset('assets/images/icons/upload.png') }}" alt="Effortless Stock Upload" class="img-fluid">
                                        <h5>Effortless Stock Upload</h5>
                                        <p>Upload your vehicle stock and prices via CSV files, simplifying the listing process</p>
                                </div>
                        </div>
                        <div class="col-sm-3">
                                <div class="box">
                                        <img src="{{ asset('assets/images/icons/add.png') }}" alt="Manual Addition Options" class="img-fluid">
                                        <h5>Manual Addition Options</h5>
                                        <p>Add vehicles manually using registration numbers or via an API feed</p>
                                </div>
                        </div>
                        <div class="col-sm-3">
                                <div class="box">
                                        <img src="{{ asset('assets/images/icons/cone.png') }}" alt="Vetting Process" class="img-fluid">
                                        <h5>Vetting Process</h5>
                                        <p>Brokerweb carefully vets every trade seller, ensuring reliability and quality</p>
                                </div>
                        </div>
                        <div class="col-sm-3">
                                <div class="box">
                                        <img src="{{ asset('assets/images/icons/checklist.png') }}" alt="Indemnification" class="img-fluid">
                                        <h5>Indemnification</h5>
                                        <p>Provides indemnity for trade buyers and finance companies for each seller, offering added security and peace of mind</p>
                                </div>
                        </div>
                        <div class="col-sm-3">
                                <div class="box">
                                        <img src="{{ asset('assets/images/icons/tick.png') }}" alt="Streamlined Communication" class="img-fluid">
                                        <h5>Streamlined Communication</h5>
                                        <p>Deal with only one company for all transactions, minimizing administrative hassle</p>
                                </div>
                        </div>
                </div>
        </div> --}}
         {!! $page->section_2 !!}
       {{--  <div class="keys">
                <h3>A brief intro of our company</h3>
                <div class="flex-list">
                        <div class="d-flex">
                                <div class="icon">
                                        <img src="{{ asset('assets/images/icons/check-success.png') }}" alt="Established Reputation" class="img-fluid">
                                </div>
                                <div class="list">
                                        <p><strong>Established Reputation:</strong> Founded in 2010, Brokerweb has a decade-long history of facilitating vehicle trades across the UK.</p>
                                </div>
                        </div>
                        <div class="d-flex">
                                <div class="icon">
                                        <img src="{{ asset('assets/images/icons/check-success.png') }}" alt="Simplified Vehicle Supply and Finance" class="img-fluid">
                                </div>
                                <div class="list">
                                        <p><strong>Simplified Vehicle Supply and Finance:</strong> Brokerweb aims to simplify the often complex process of vehicle supply and finance. By providing easy access to vehicle stock, it enables buyers to focus on finding the best deals for their customers.</p>
                                </div>
                        </div>
                        <div class="d-flex">
                                <div class="icon">
                                        <img src="{{ asset('assets/images/icons/check-success.png') }}" alt="Check" class="img-fluid">
                                </div>
                                <div class="list">
                                        <p><strong>Customer-Centric Approach:</strong> By shifting the burden of vehicle sourcing to the customer, Brokerweb allows buyers to focus on serving their clients more effectivelOverall, Brokerweb offers a comprehensive solution for both trade buyers and sellers, aiming to streamline the vehicle trading process while prioritizing transparency, convenience, and reliability.</p>
                                </div>
                        </div>
                </div>
        </div> --}}
        {!! $page->section_3 !!}
</div>

@endsection