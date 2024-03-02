@extends('layouts.front')
@section('content')

<div class="container">
        <div class="contact-us">
                <div class="row">
                        <div class="col-sm-6">
                                <h1>Customer Support</h1>
                                <p>If you have any questions or queries, please feel free to ask us. Our executive will be in touch with in 24 hours.</p>


                                @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                            @endif

                            <form class="form" method="POST" action="{{ route('customer-support') }}" id="contactForm">
                                @csrf
                                @method('POST')
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="exampleFormControlInput1" class="form-label">Your name</label>
                                    <input type="text" required class="form-control" value="{{ old('name') }}" name="name">
                                </div>
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label for="exampleFormControlInput1" class="form-label">our email</label>
                                    <input type="email" required class="form-control" value="{{ old('email') }}" name="email">
                                </div>
                                <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                                    <label for="exampleFormControlInput1" class="form-label">Phone number (optional)</label>
                                    <input type="number" required class="form-control" value="{{ old('mobile') }}" name="mobile">
                                </div>
                                <div class="form-group {{ $errors->has('query') ? 'has-error' : '' }}">
                                    <label for="exampleFormControlInput1" class="form-label">Your message</label>
                                    <textarea class="form-control" required rows="5" name="query">{{ old('query') }}</textarea>
                                </div>
                                <div class="form-group text-center">
                                    <button class="btn btn-primary" type="submit">Send Message</button>
                                </div>
                            </form>
                            
                        </div>
                        <div class="col-sm-6">
                                <div class="right-side">
                                        <img src="{{ asset('assets/images/outbox.png') }}" alt="Contact us" class="img-fluid">
                                        <div class="flex-list">
                                                <div class="d-flex">
                                                        <div class="icon">
                                                                <img src="{{ asset('assets/images/icons/pin.png') }}" alt="pin" class="img-fluid">   
                                                        </div>
                                                        <div class="list">
                                                                <p>31 Old Fields Road, Bocam park, Pencoed, Bridgend, CF35 5LJ</p>
                                                        </div>
                                                </div>
                                                <div class="d-flex">
                                                        <div class="icon">
                                                                <img src="{{ asset('assets/images/icons/email.png') }}" alt="email" class="img-fluid">   
                                                        </div>
                                                        <div class="list">
                                                                <p>info@email.com</p>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>
       

@endsection