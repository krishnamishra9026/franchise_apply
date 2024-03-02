@extends('layouts.admin')
@section('title', 'Inbox')
@section('content')

<div class="content">

    <div class="container-fluid">
        <div class="row mt-3">
            <!-- start chat users-->
            <div class="col-xxl-3 col-xl-6 order-xl-1">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="tab-content">
                            <div class="tab-pane show active p-3" id="newpost">

                                <!-- start search box -->
                                <div class="app-search">
                                    <form>
                                        <div class="mb-2 position-relative">
                                            <input type="text" class="form-control"
                                                placeholder="People & messages..." id="search-user"/>
                                            <span class="mdi mdi-magnify search-icon"></span>
                                        </div>
                                    </form>
                                </div>
                                <!-- end search box -->

                                <!-- users -->
                                <div class="row">
                                    <div class="col">
                                        <div data-simplebar style="max-height: 550px" id="senders">
                                            
                                            <!-- <a href="javascript:void(0);" class="text-body">
                                                <div class="d-flex align-items-start mt-1 p-2">
                                                    <img src="{{ asset('assets/images/users/avatar-2.jpg') }}" class="me-2 rounded-circle" height="48" alt="Brandon Smith" />
                                                    <div class="w-100 overflow-hidden">
                                                        <h5 class="mt-0 mb-0 font-14">
                                                            <span class="float-end text-muted font-12">4:30am</span>
                                                            Brandon Smith
                                                        </h5>
                                                        <p class="mt-1 mb-0 text-muted font-14">
                                                            <span class="w-25 float-end text-end"><span class="badge badge-danger-lighten">3</span></span>
                                                            <span class="w-75">How are you today?</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>

                                            <a href="javascript:void(0);" class="text-body">
                                                <div class="d-flex align-items-start bg-light p-2">
                                                    <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" class="me-2 rounded-circle" height="48" alt="Shreyu N" />
                                                    <div class="w-100 overflow-hidden">
                                                        <h5 class="mt-0 mb-0 font-14">
                                                            <span class="float-end text-muted font-12">5:30am</span>
                                                            Shreyu N
                                                        </h5>
                                                        <p class="mt-1 mb-0 text-muted font-14">
                                                            <span class="w-75">Hey! a reminder for tomorrow's meeting...</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>

                                            <a href="javascript:void(0);" class="text-body">
                                                <div class="d-flex align-items-start mt-1 p-2">
                                                    <img src="{{asset('assets/images/users/avatar-7.jpg')}}" class="me-2 rounded-circle" height="48" alt="Maria C" />
                                                    <div class="w-100 overflow-hidden">
                                                        <h5 class="mt-0 mb-0 font-14">
                                                            <span class="float-end text-muted font-12">Thu</span>
                                                            Maria C
                                                        </h5>
                                                        <p class="mt-1 mb-0 text-muted font-14">
                                                            <span class="w-25 float-end text-end"><span class="badge badge-danger-lighten">2</span></span>
                                                            <span class="w-75">Are we going to have this week's planning meeting today?</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>

                                            <a href="javascript:void(0);" class="text-body">
                                                <div class="d-flex align-items-start mt-1 p-2">
                                                    <img src="{{ asset('assets/images/users/avatar-10.jpg') }}"
                                                        class="me-2 rounded-circle" height="48" alt="Rhonda D" />
                                                    <div class="w-100 overflow-hidden">
                                                        <h5 class="mt-0 mb-0 font-14">
                                                            <span class="float-end text-muted font-12">Wed</span>
                                                            Rhonda D
                                                        </h5>
                                                        <p class="mt-1 mb-0 text-muted font-14">
                                                            <span class="w-75">Please check these design assets...</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a> -->
                                        </div> <!-- end slimscroll-->
                                    </div> <!-- End col -->
                                </div>
                                <!-- end users -->
                            </div> <!-- end Tab Pane-->
                        </div> <!-- end tab content-->
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div>
            <!-- end chat users-->

            <!-- chat area -->
            <div class="col-xxl-6 col-xl-12 order-xl-2">
                <div class="card">
                    <div class="card-body">
                        <ul id="conversation-list" class="conversation-list" data-simplebar style="max-height: 537px;overflow-y: scroll;">
                            {{-- <li class="clearfix">
                                <div class="chat-avatar">
                                    <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" class="rounded" alt="Shreyu N" />
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
                                    <button class="btn btn-sm btn-link" data-bs-toggle="dropdown"
                                        aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>

                                    <div class="dropdown-menu dropdown-menu-end">
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
                                    <button class="btn btn-sm btn-link" data-bs-toggle="dropdown"
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
                                    <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" class="rounded" alt="Shreyu N" />
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
                                    <button class="btn btn-sm btn-link" data-bs-toggle="dropdown"
                                        aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>

                                    <div class="dropdown-menu dropdown-menu-end">
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
                                    <button class="btn btn-sm btn-link" data-bs-toggle="dropdown"
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
                                    <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="Shreyu N" class="rounded" />
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
                                    <button class="btn btn-sm btn-link" data-bs-toggle="dropdown"
                                        aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>

                                    <div class="dropdown-menu dropdown-menu-end">
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
                                    <button class="btn btn-sm btn-link" data-bs-toggle="dropdown"
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
                                    <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="Shreyu N" class="rounded" />
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
                                    <button class="btn btn-sm btn-link" data-bs-toggle="dropdown"
                                        aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Copy Message</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="chat-avatar">
                                    <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="Shreyu N" class="rounded" />
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
                                    <button class="btn btn-sm btn-link" data-bs-toggle="dropdown"
                                        aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>

                                    <div class="dropdown-menu dropdown-menu-end">
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
                                    <div class="card mt-2 mb-1 shadow-none border text-start">
                                        <div class="p-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar-sm">
                                                        <span class="avatar-title rounded">
                                                            .ZIP
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col ps-0">
                                                    <a href="javascript:void(0);"
                                                        class="text-muted fw-bold">Hyper-admin-design.zip</a>
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
                                    <button class="btn btn-sm btn-link" data-bs-toggle="dropdown"
                                        aria-expanded="false"><i class='uil uil-ellipsis-v'></i></button>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Copy Message</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </li> --}}
                            <li>there is no message available</li>
                        </ul>

                        <div class="row">
                            <div class="col">
                                <div class="mt-2 bg-light p-3 rounded">
                                    <form class="needs-" novalidate="" name="chat-form"
                                        id="chat-form">
                                        <div class="row">
                                            <input type="hidden" id="user-id">
                                            <input type="hidden" id="user-type">
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
            <div class="col-xxl-3 col-xl-6 order-xl-1 order-xxl-2">
                <div class="card">
                    <div class="card-body">
                        <div class="mt-3 text-center">
                            <img src="{{ asset('assets/images/avatar.png') }}" alt="shreyu"
                                class="img-thumbnail avatar-lg rounded-circle" id="user-img"/>
                            <h4 id="user-name">Shreyu N</h4>
                            <p class="text-muted mt-2 font-14" >Last Interacted On: <strong id="user-last-interact"></strong></p>
                        </div>

                        <div class="mt-3">
                            <hr class="" />
                            <p class="mt-4 mb-1"><strong>Type:</strong></p>
                            <p id="user-user-type"></p>
                            <p class="mt-4 mb-1"><strong><i class='uil uil-at'></i> Email:</strong></p>
                            <p id="user-email"></p>

                            <p class="mt-3 mb-1"><strong><i class='uil uil-phone'></i> Phone Number:</strong></p>
                            <p id="user-phone"></p>
                        </div>
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div> <!-- end col -->
            <!-- end user detail -->
        </div> <!-- end row-->

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
            var search ='';
            function getSender(){
                $.ajax({
                    type: 'GET',
                    url: "{{ route('admin.inbox.get-sender') }}",
                    data: {'search':search},
                    success: (data) => {
                       $('#senders').html(data.html);
                    },
                    error: function(data) {
                        alert(data.responseJSON.errors.files[0]);
                    }
                });
            } 
            getSender()
            setInterval(getSender, 5000);
            $('form').delegate('#search-user','change',function(e){
               search = $(this).val();
               getSender()
            })
            function getActiveUser(){
                $.ajax({
                    type: 'GET',
                    url: "{{ route('admin.inbox.get-active-sender') }}",
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: (data) => {
                       $('#user-id').val(data.active.user_id);
                       $('#user-type').val(data.active.type);
                       $('#user-user-type').html(data.active.type);
                       $('#user-name').html(data.active.name);
                       $('#user-email').html(data.active.email);
                       $('#user-phone').html(data.active.phone);
                       $('#user-last-interact').html(data.active.last_interact);
                    },
                    error: function(data) {
                        alert(data.responseJSON.errors.files[0]);
                    }
                });
            } 
            getActiveUser(); 
            function getActiveMessages(){
                $.ajax({
                    type: 'GET',
                    url: "{{ route('admin.inbox.get-active-messages') }}",
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
          setInterval(getActiveMessages, 5000);
          $('#chat-form').submit(function(e) {
                e.preventDefault();
                $('#error-message').css('display','none');
               let message = $('#input-message').val();
               let user_id =$('#user-id').val();
               let type =$('#user-type').val();
             
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
                formData.append('user_id', user_id);
                formData.append('type', type);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.inbox.store-message') }}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: (data) => {
                        this.reset();
                        getActiveUser()
                        getActiveMessages()
                        updateScroll()
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

        function updateScroll(){
            var element = document.getElementById("conversation-list");
            element.scrollTop = element.scrollHeight;
        }
        updateScroll()
        $('#senders').delegate("a",'click',function(e){
            e.preventDefault()
            let chat_id = $(this).attr('data-id');
             $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.inbox.store-active-message') }}",
                    data: {'chat_id':chat_id},
                    success: (data) => {
                        getActiveUser()
                        getActiveMessages()
                        updateScroll()
                    },
                    error: function(data) {
                        
                    }
                });
        });
            
});

</script>


@endpush