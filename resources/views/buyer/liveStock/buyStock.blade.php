@extends('layouts.buyer')
@section('title', 'Place Order')
@section('content')

<div class="content">
    <!-- Topbar Start -->
    @include('buyer.includes.navbar')
    <!-- end Topbar -->

    <div class="container-fluid">
        <form method="POST" action="{{ route('buyer.orders.store') }}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mt-3">
                <h4 class="card-title mb-2">Customer details</h4>   
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Ref</label>
                                    <input type="text" id="ref" name="reference_no" required class="form-control" placeholder="Reference No.">
                                    <input type="hidden" value="{{ $car_id }}" name="car_id">
                                    <input type="hidden" value="{{ $seller_id }}" name="seller_id">
                                    <input type="hidden" value="{{ @$car_seller->car_base_price }}" name="price">
                                    <input type="hidden" value="{{ auth()->user()->id }}" name="buyer_id">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Title</label>
                                    <select name="title" id="title" name="title" class="form-control">
                                        <option value="">Please select</option>
                                        <option value="mr">Mr</option>
                                        <option value="mrs">Mrs</option>
                                        <option value="miss">Miss</option>
                                        <option value="ms">Ms</option>
                                        <option value="dr">Dr</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">First Name</label>
                                    <input type="text" id="fname" class="form-control" required name="first_name" placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" id="lname" class="form-control" name="last_name" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="email" id="email" class="form-control" required name="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Company Name</label>
                                    <input type="text" id="cname" class="form-control" required name="company_name" placeholder="Company Name">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h4 class="card-title mb-2">Delivery details</h4>
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Delivery date</label>
                                    <input type="date" class="form-control" name="delivery_date" required placeholder="Select date">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Driver name</label>
                                    <input type="name" class="form-control" name="driver_name" placeholder="Driver Name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Driver phone</label>
                                    <input type="tel" class="form-control" name="driver_phone" required placeholder="Driver phone">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Delivery address</label>
                                    <input type="text" class="form-control" name="delivery_address" required placeholder="Delivery address">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Address 2 (optional)</label>
                                    <input type="text" class="form-control" name="address" placeholder="Address 2">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control" name="city" placeholder="City">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Postcode</label>
                                    <input type="number" class="form-control" name="postcode" placeholder="Postcode">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Comments (if any)</label>
                                    <textarea name="" id="" cols="30" rows="10" name="comments" class="form-control" placeholder="Write your message"></textarea>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="float-right">
                    <button type="submit" class="btn btn-primary">PLACE ORDER</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection