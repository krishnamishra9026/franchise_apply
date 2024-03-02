@extends('layouts.front')
@section('meta_field')
 <meta name="keywords" content="{{ $page->meta_title }}">
 <meta name="description" content="{{ $page->meta_description }}">
@endsection
@section('content')

{{-- <div class="by-banner">
        <div class="container-fluid">
                <div class="row">
                        <div class="col-sm-6">
                                <h1><span class="looking">Looking</span> for the <span style="display: block">Right Stock?</span></h1>
                                <p>We've got you covered. We know that finding the right stock is often the toughest aspect of a broker's job. While selling the same model is straightforward, ensuring you secure the best price and shield yourself from untrustworthy suppliers is crucial.</p>
                                <a href="{{ url('buyer.login')}}" class="btn btn-primary btn-lg">Buy Now</a>
                        </div>
                        <div class="col-sm-6">
                                <img src="{{ asset('assets/images/banner-art.png') }}" alt="Buyer" class="img-fluid">
                        </div>
                </div>
                
        </div>
</div> --}}
{!! $page->section_1 !!}
{{-- <div class="container">
        <div class="place-order mt-5">
                <div class="row">
                        <div class="col-sm-6">
                                <h3>How to place your order?</h3>
                                <p>Just place your van order. We'll verify its availability and send you an invoice. It's typically available in 99% of cases or something very close.</p>
                                <div class="flex-list">
                                        <div class="d-flex">
                                                <div class="icon">
                                                        <img src="{{ asset('assets/images/icons/check-success.png') }}" alt="Check" class="img-fluid">
                                                </div>
                                                <div class="list">
                                                        <p>Create a buyer account</p>    
                                                </div>
                                        </div>
                                        <div class="d-flex">
                                                <div class="icon">
                                                        <img src="{{ asset('assets/images/icons/check-success.png') }}" alt="Check" class="img-fluid">
                                                </div>
                                                <div class="list">
                                                        <p>Search your stock</p>    
                                                </div>
                                        </div>
                                        <div class="d-flex">
                                                <div class="icon">
                                                        <img src="{{ asset('assets/images/icons/check-success.png') }}" alt="Check" class="img-fluid">
                                                </div>
                                                <div class="list">
                                                        <p>Check vehicle details</p>    
                                                </div>
                                        </div>
                                        <div class="d-flex">
                                                <div class="icon">
                                                        <img src="{{ asset('assets/images/icons/check-success.png') }}" alt="Check" class="img-fluid">
                                                </div>
                                                <div class="list">
                                                        <p>Place your order</p>    
                                                </div>
                                        </div>
                                </div>
                                <div class="btn-group">
                                        <a href="{{ url('buyer.login')}}" class="btn btn-primary btn-lg">See live stock</a>
                                </div>
                        </div>
                        <div class="col-sm-6">
                                <img src="{{ asset('assets/images/place-order2.png') }}" alt="Place Order" class="img-fluid" style="border: 3px solid #ccc">   
                        </div>
                </div>
        </div>
        <div class="simple">
                <h2 class="mt-4"><strong>It's that simple</strong></h2>
                <p>For instance, consider the Ford Mustang page. Customers can easily check availability for all Mustangs or specific ones. It's user-friendly. Alternatively, keep us updated with the invoice details. If you need a stock feed, simply integrate the API key, especially for WordPress sites, or use our API key. While some sites may require custom adjustments, the return on investment is rapid. Focus on vehicle inquiries you can fulfill, not mythical unicorns!</p>
                <img src="{{ asset('assets/images/s-live-stock.png') }}" alt="Live stock" class="img-fluid" style="border: 3px solid #ccc">
                <div class="mt-2 text-center">
                        <a href="{{ url('buyer.login')}}" class="btn btn-primary btn-lg">Login as a Buyer</a>
                </div>
        </div>
</div> --}}

{!! $page->section_2 !!}

@endsection