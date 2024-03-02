@extends('layouts.admin')
@section('title', 'Edit Seller')
@section('content')

<div class="content">


    <div class="container-fluid">
        <div class="card mt-3 mb-2">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.sellers.update', $seller->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="form-label">Company Name</label>
                        <input type="text" class="form-control" name="company_name" value="{{ @$seller->company_name }}" placeholder="Company Name">
                    </div>
                    <div class="form-group">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" required name="firstname" value="{{ $seller->firstname }}" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="lastname" value="{{ $seller->lastname }}" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" required name="email" value="{{ $seller->email }}"placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Phone No.</label>
                        <input type="number" class="form-control" name="phone" value="{{ $seller->phone }}" placeholder="Phone No.">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" value="{{ $seller->address }}" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <label class="form-label">City</label>
                        <input type="text" class="form-control" name="city" value="{{ $seller->city }}" placeholder="City">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Postcode</label>
                        <input type="text" class="form-control" name="postcode" value="{{ $seller->postcode }}" placeholder="Postcode">
                    </div>
                    <div class="form-group">
                        <label for="name" class="form-label">Status</label>
                        <select class="form-control" name="status" id="example-select">
                            <option value="">Select Status</option>
                            <option @if(old('status', $seller->status) == 1 ) selected @endif value="1">Enable</option>
                            <option @if(old('status', $seller->status) == 0 ) selected @endif value="0">Disable</option>
                        </select>
                        @error('status')
                        <code id="name-error" class="text-danger">{{ $message }}</code>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection