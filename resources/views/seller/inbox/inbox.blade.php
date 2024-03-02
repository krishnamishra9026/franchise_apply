@extends('layouts.seller')
@section('title', 'Inbox')
@section('content')

<div class="content">
    <!-- Topbar Start -->
    @include('seller.includes.navbar')
    <!-- end Topbar -->

    <div class="support-page container-fluid">
        <div class="card mt-3">
            <div class="card-body">
                <h1>Welcome to Customer Support</h1>
                <p>How can I assist you with customer support today? Whether you have questions, need help with a vehicle or service, or want to provide feedback, feel free to let me know what you need assistance with.</p>
                <div class="text-center">
                    <a href="{{ route('seller.chat') }}" class="btn btn-primary">Start Chat</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection