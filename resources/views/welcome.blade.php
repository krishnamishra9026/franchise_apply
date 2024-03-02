@extends('layouts.front')
@section('meta_field')
 <meta name="keywords" content="{{ $page->meta_title }}">
 <meta name="description" content="{{ $page->meta_description }}">
@endsection
@section('content')
    {{-- <section class="main-banner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Turbocharged Choices, Unmatched Joys</h4>
                    <h1>Buy Or Sell Your Car <span>On Broker Web</span></h1>
                    <p>We offer outstanding customer service <span class="desk-block">at great prices</span></p>
                    <div>
                        <a href="{{ url('buyer-information')}}" class="btn btn-primary">Buy a car</a>
                        <a href="{{ url('seller-information')}}" class="ml-2 btn btn-secondary">Sell my car</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <img src="{{ asset('assets/images/car-2.png') }}" alt="Car" class="img-fluid">
                </div>
            </div>
        </div>
    </section> --}}

    {!! $page->section_1 !!}

  {{--   <section class="container why-buy">
        <h4 class="sub-title">Top highlights</h4>
        <h2>Select what you want</h2>
        <p class="special">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>
        <div class="row">
            <div class="col-sm-4">
                <div class="box">
                    <img src="{{ asset('assets/images/icons/buyers.png') }}" alt="Buyers" class="img-fluid">
                    <h4>Buyers</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam quis nostrud exercitation ullamco laboris</p>
                    <a style="text-decoration: underline" href="{{ url('buyer-information')}}" class="btn btn-link">Know More</a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="box">
                    <img src="{{ asset('assets/images/icons/sellers.png') }}" alt="Sellers" class="img-fluid">
                    <h4>Sellers</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam quis nostrud exercitation ullamco laboris</p>
                    <a style="text-decoration: underline" href="{{ url('buyer-information')}}" class="btn btn-link">Know More</a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="box">
                    <img src="{{ asset('assets/images/icons/engage.png') }}" alt="Sellers" class="img-fluid">
                    <h4>Live Stock</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam quis nostrud exercitation ullamco laboris</p>
                    <a style="text-decoration: underline" href="{{ route ('buyer.login')}}" class="btn btn-link">Know More</a>
                </div>
            </div>
        </div>
    </section> --}}

     {!! $page->section_2 !!}

   {{--  <section class="container wedo">
        <div class="row">
            <div class="col-sm-6">
                <img src="{{ asset('assets/images/wedo.jpg') }}" alt="We do" class="img-fluid">
            </div>
            <div class="col-sm-6">
                <h5>About Us</h5>
                <h2>We love what we do</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                <blockquote>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam eaque ipsa quae ab illo inventore</blockquote>
                <a href="{{ url('about-us')}}" class="btn btn-primary btn-lg">Know more</a>
            </div>
        </div>
    </section> --}}
     {!! $page->section_3 !!}

   {{--  <section class="choose">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-8">
                    <h3>Why Choose Us</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Ut enim ad minim veniam</p>
                </div>
                <div class="col-sm-4 col-4">
                    <div class="float-right">
                        <a href="{{ url('register')}}" class="btn btn-outline btn-lg">Sign Up</a>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-4">
                    <div class="box">
                        <img src="{{ asset('assets/images/icons/realtime.png') }}" alt="Realtime Vehicle Data" class="img-fluid">
                        <h5>Realtime Vehicle Data</h5>
                        <p>Configure vehicles in just a few clicks, from presales enquiries to delivery all in one place. </p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box">
                        <img src="{{ asset('assets/images/icons/ready-stock.png') }}" alt="Live vehicle stock availability" class="img-fluid">
                        <h5>Live vehicle stock availability</h5>
                        <p>Faster access to stock availability and lead time information, streamlining your order process for improved efficiency.</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box">
                        <img src="{{ asset('assets/images/icons/discount.png') }}" alt="Vehicle Discounts" class="img-fluid">
                        <h5>Vehicle Discounts</h5>
                        <p>No more waiting for dealer's discounts. Get instant access to discounts at the point of configuration.</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box">
                        <img src="{{ asset('assets/images/icons/choices.png') }}" alt="Realtime Order Updates" class="img-fluid">
                        <h5>Realtime Order Updates</h5>
                        <p>Order status updates available within the system with full history and message logs.</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box">
                        <img src="{{ asset('assets/images/icons/easy.png') }}" alt="Easy to use our system" class="img-fluid">
                        <h5>Easy to use our system</h5>
                        <p>A lot of attention and time have been spent to create a user fiendly system to improve customer experience.</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box">
                        <img src="{{ asset('assets/images/icons/conversation.png') }}" alt="Instant Messaging Service" class="img-fluid">
                        <h5>Instant Messaging Service</h5>
                        <p>Instant messaging facility to streamline interactions between brokers and dealers to cut down on emails and calls.</p>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
     {!! $page->section_4 !!}

    {{-- <section class="container looking">
        <div class="row">
            <div class="col-sm-6">
                <a href="#">
                    <div class="box">
                        <h4>Are you looking for a Car?</h4>
                        <p>We can help you buy quicker</p>
                        <a href="{{ url('login')}}" class="btn btn-outline">Buy Now</a>
                    </div>
                </a>
            </div>
            <div class="col-sm-6">
                <a href="#">
                    <div class="box">
                        <h4>Do you want to sell your Car?</h4>
                        <p>Enroll your stock and get buyers faster</p>
                        <a href="{{ url('login')}}" class="btn btn-outline">Sell Now</a>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <section class="container our-data">
        <div class="row">
            <div class="col-sm-3 col-6">
                <h5>20</h5>
                <p>Years of experience</p>
                <img src="{{ asset('assets/images/icons/exp.png') }}" alt="Years of experience" class="img-fluid">
            </div>
            <div class="col-sm-3 col-6">
                <h5>560</h5>
                <p>Vehicles in stock</p>
                <img src="{{ asset('assets/images/icons/stock.png') }}" alt="Vehicles in stock" class="img-fluid">
            </div>
            <div class="col-sm-3 col-6">
                <h5>75</h5>
                <p>Team members</p>
                <img src="{{ asset('assets/images/icons/customers.png') }}" alt="Team members" class="img-fluid">
            </div>
            <div class="col-sm-3 col-6">
                <h5>120</h5>
                <p>Happy customers</p>
                <img src="{{ asset('assets/images/icons/world.png') }}" alt="Happy customers" class="img-fluid">
            </div>
        </div>
    </section> --}}
     {!! $page->section_5 !!}

    <section class="container blogs">
        <h4>Featured Articles</h4>
        <h3>Our latest blogs</h3>
        <div class="row">
            <div class="col-sm-4">
                <div class="post-box">
                    <a href="#"><img src="{{ asset('assets/images/b1.jpeg') }}" alt="" class="img-fluid"></a>
                    <a href="#"><h5>Buy your dream Car</h5></a>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Ut enim ad minim veniam....</p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="post-box">
                    <a href="#"><img src="{{ asset('assets/images/b2.jpeg') }}" alt="" class="img-fluid"></a>
                    <a href="#"><h5>Important information to sellers</h5></a>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Ut enim ad minim veniam....</p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="post-box">
                    <a href="#"><img src="{{ asset('assets/images/b3.jpeg') }}" alt="" class="img-fluid"></a>
                    <a href="#"><h5>How to update stock?</h5></a>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Ut enim ad minim veniam....</p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
    </section>
@endsection
