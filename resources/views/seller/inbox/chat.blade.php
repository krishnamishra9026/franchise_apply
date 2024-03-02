@extends('layouts.seller')
@section('title', 'Inbox')
@section('content')

<div class="content">
    <!-- Topbar Start -->
    @include('seller.includes.navbar')
    <!-- end Topbar -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-9 col-lg-12 order-lg-2 order-xl-1">
                <div class="card mt-4">
                    <div class="card-body">
                        <ul class="conversation-list" data-simplebar style="max-height: 537px; overflow-y: scroll;">
                            <li class="clearfix">
                                <div class="chat-avatar">
                                    <img src="{{ asset('assets/images/users/avatar-5.jpg') }}" class="rounded" alt="Shreyu N" />
                                    <i>10:00</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <i>Shreyu N</i>
                                        <p>
                                            Hello!
                                        </p>
                                    </div>
                                </div>
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-link" data-toggle="dropdown"
                                        aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Copy Message</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix odd">
                                <div class="chat-avatar">
                                    <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" class="rounded" alt="dominic" />
                                    <i>10:01</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <i>Dominic</i>
                                        <p>
                                            Hi, How are you? What about our next meeting?
                                        </p>
                                    </div>
                                </div>
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-link" data-toggle="dropdown"
                                        aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Copy Message</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="chat-avatar">
                                    <img src="{{ asset('assets/images/users/avatar-5.jpg') }}" class="rounded" alt="Shreyu N" />
                                    <i>10:01</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <i>Shreyu N</i>
                                        <p>
                                            Yeah everything is fine
                                        </p>
                                    </div>
                                </div>
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-link" data-toggle="dropdown"
                                        aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Copy Message</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix odd">
                                <div class="chat-avatar">
                                    <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" class="rounded" alt="dominic" />
                                    <i>10:02</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <i>Dominic</i>
                                        <p>
                                            Wow that's great
                                        </p>
                                    </div>
                                </div>
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-link" data-toggle="dropdown"
                                        aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Copy Message</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="chat-avatar">
                                    <img src="{{ asset('assets/images/users/avatar-5.jpg') }}" alt="Shreyu N" class="rounded" />
                                    <i>10:02</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <i>Shreyu N</i>
                                        <p>
                                            Let's have it today if you are free
                                        </p>
                                    </div>
                                </div>
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-link" data-toggle="dropdown"
                                        aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Copy Message</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix odd">
                                <div class="chat-avatar">
                                    <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="dominic" class="rounded" />
                                    <i>10:03</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <i>Dominic</i>
                                        <p>
                                            Sure thing! let me know if 2pm works for you
                                        </p>
                                    </div>
                                </div>
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-link" data-toggle="dropdown"
                                        aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Copy Message</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="chat-avatar">
                                    <img src="{{ asset('assets/images/users/avatar-5.jpg') }}" alt="Shreyu N" class="rounded" />
                                    <i>10:04</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <i>Shreyu N</i>
                                        <p>
                                            Sorry, I have another meeting scheduled at 2pm. Can we have it
                                            at 3pm instead?
                                        </p>
                                    </div>
                                </div>
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-link" data-toggle="dropdown"
                                        aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Copy Message</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="chat-avatar">
                                    <img src="{{ asset('assets/images/users/avatar-5.jpg') }}" alt="Shreyu N" class="rounded" />
                                    <i>10:04</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <i>Shreyu N</i>
                                        <p>
                                            We can also discuss about the presentation talk format if you have some extra mins
                                        </p>
                                    </div>
                                </div>
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-link" data-toggle="dropdown"
                                        aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Copy Message</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix odd">
                                <div class="chat-avatar">
                                    <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="dominic" class="rounded" />
                                    <i>10:05</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <i>Dominic</i>
                                        <p>
                                            3pm it is. Sure, let's discuss about presentation format, it would be great to finalize today. 
                                            I am attaching the last year format and assets here...
                                        </p>
                                    </div>
                                    <div class="card mt-2 mb-1 shadow-none border text-left">
                                        <div class="p-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar-sm">
                                                        <span class="avatar-title rounded">
                                                            .ZIP
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col pl-0">
                                                    <a href="javascript:void(0);"
                                                        class="text-muted font-weight-bold">Hyper-admin-design.zip</a>
                                                    <p class="mb-0">2.3 MB</p>
                                                </div>
                                                <div class="col-auto">
                                                    <!-- Button -->
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-link btn-lg text-muted">
                                                        <i class="dripicons-download"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-link" data-toggle="dropdown"
                                        aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Copy Message</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <div class="row">
                            <div class="col">
                                <div class="mt-2 bg-light p-3 rounded">
                                     <form class="needs-" novalidate="" name="chat-form"
                                        id="chat-form">
                                        <div class="row">
                                            <div class="col mb-2 mb-sm-0">
                                                <input type="text" class="form-control border-0" placeholder="Enter your text" required="" id="input-message">
                                                <div class="invalid-feedback" id="error-message" style="display: none;">
                                                    Please enter your messsage
                                                </div>
                                                <input type="file" id="files"  multiple onchange="javascript:updateList()" style="display:none;">
                                                <div id="fileList"></div>
                                            </div>
                                            <div class="col-sm-auto">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-light"><i class="uil uil-paperclip" onclick="$('#files').trigger('click')"></i></button>
                                                    <!-- <a href="#" class="btn btn-light"> <i class='uil uil-smile'></i> </a> -->
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-success chat-send" id="chat-form-submit"><i class='uil uil-message'></i></button>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row-->
                                    </form>
                                </div> 
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div>
            <!-- end chat area-->

            <!-- start user detail -->
            <div class="col-xl-3 col-lg-6 order-lg-1 order-xl-2 mt-4">
                <div class="card">
                    <div class="card-body">
                        <div class="mt-3 text-center">
                            @if($admin->avatar)
                            <img src="{{ $admin->path }}" alt="shreyu"
                                class="img-thumbnail avatar-lg rounded-circle" />
                            @else
                            <img src="{{ asset('assets/images/users/avatar-5.jpg') }}" alt="shreyu"
                                class="img-thumbnail avatar-lg rounded-circle" />
                            @endif
                            <h4>{{ $admin->firstname }} {{ $admin->lastname }}</h4>
                            <p class="text-muted mt-2 font-14">Last Interacted: <strong>Few hours back</strong></p>
                        </div>

                        <div class="mt-3">
                            <hr class="" />
                            <p class="mt-4 mb-1"><strong><i class='uil uil-at'></i> Email:</strong></p>
                            <p>{{ $admin->email }}</p>

                            <p class="mt-3 mb-1"><strong><i class='uil uil-phone'></i> Phone Number:</strong></p>
                            <p>{{ $admin->phone }}</p>
                            {{-- <p class="text-center"><a href="{{ route('seller.inbox') }}" class="btn btn-danger">End Chat</a></p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script type="text/javascript">
$(document).ready(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            function getActiveMessages(){
                $.ajax({
                    type: 'GET',
                    url: "{{ route('seller.inbox.get-messages') }}",
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: (data) => {
                       $('.conversation-list').html(data.html);
                    },
                    error: function(data) {
                       
                    }
                });
            }   
          getActiveMessages(); 
          setInterval(getActiveMessages, 10000);
            $('#chat-form').submit(function(e) {
                e.preventDefault();
                $('#error-message').css('display','none');
               let message = $('#input-message').val();
                var formData = new FormData(this);
                let totalFilesToBeUploaded = $('#files')[0].files.length;
                let files = $('#files')[0];
                for (let i = 0; i < totalFilesToBeUploaded; i++) {
                    formData.append('files' + i, files.files[i]);
                }
                if(message == '' && totalFilesToBeUploaded==0){
                  $('#error-message').css('display','block');
                  return false
                }
                formData.append('totalFilesToBeUploaded', totalFilesToBeUploaded);
                formData.append('message', message);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('seller.inbox.store-message') }}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: (data) => {
                        this.reset();
                        getActiveMessages()
                        updateList()
                    },
                    error: function(data) {
                        
                    }
                });
            });
           updateList = function() {
            var input = document.getElementById('files');
            var output = document.getElementById('fileList');
            var children = "";
            for (var i = 0; i < input.files.length; ++i) {
                children += '<li>' + input.files.item(i).name + '</li>';
            }
            output.innerHTML = '<ul>'+children+'</ul>';
        }
});
</script>
@endpush