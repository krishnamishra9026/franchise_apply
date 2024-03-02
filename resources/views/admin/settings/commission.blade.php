@extends('layouts.admin')
@section('title', 'Commission')
@section('content')

 <!-- Topbar Start -->
<!-- end Topbar -->

<div class="container-fluid">
    <div class="card mt-3">
        <div class="card-body">

            <form id="accountForm" method="POST"
            action="{{ route('admin.commission.update') }}" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="form-group">
                <label class="form-label">Enter commission rate (in%)</label>
                <input type="text" name="amount" class="form-control" placeholder="Eg. 10" value="{{ $commission_setting->amount ?? 5 }}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
        </div>
    </div>
</div>

@endsection