@extends('layouts.admin')
@section('title', 'Users')
@section('content')

<div class="content">
    <!-- Topbar Start -->
    {{-- <div class="navbar-custom">
        <ul class="list-unstyled topbar-menu float-end mb-0">
            

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="dripicons-bell noti-icon"></i>
                    <span class="noti-icon-badge"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg">

                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="m-0">
                            <span class="float-end">
                                <a href="javascript: void(0);" class="text-dark">
                                    <small>Clear All</small>
                                </a>
                            </span>Notification
                        </h5>
                    </div>

                    <div style="max-height: 230px;" data-simplebar>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-primary">
                                <i class="mdi mdi-comment-account-outline"></i>
                            </div>
                            <p class="notify-details">Caleb Flakelar commented on Admin
                                <small class="text-muted">1 min ago</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-info">
                                <i class="mdi mdi-account-plus"></i>
                            </div>
                            <p class="notify-details">New user registered.
                                <small class="text-muted">5 hours ago</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon">
                                <img src="{{ asset('assets/images/users/avatar-2.jpg') }}" class="img-fluid rounded-circle" alt="" /> </div>
                            <p class="notify-details">Cristina Pride</p>
                            <p class="text-muted mb-0 user-msg">
                                <small>Hi, How are you? What about our next meeting</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-primary">
                                <i class="mdi mdi-comment-account-outline"></i>
                            </div>
                            <p class="notify-details">Caleb Flakelar commented on Admin
                                <small class="text-muted">4 days ago</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon">
                                <img src="{{ asset('assets/images/users/avatar-4.jpg') }}" class="img-fluid rounded-circle" alt="" /> </div>
                            <p class="notify-details">Karen Robinson</p>
                            <p class="text-muted mb-0 user-msg">
                                <small>Wow ! this admin looks good and awesome design</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-info">
                                <i class="mdi mdi-heart"></i>
                            </div>
                            <p class="notify-details">Carlos Crouch liked
                                <b>Admin</b>
                                <small class="text-muted">13 days ago</small>
                            </p>
                        </a>
                    </div>

                    <!-- All-->
                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                        View All
                    </a>

                </div>
            </li>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                    aria-expanded="false">
                    <span class="account-user-avatar"> 
                        <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="user-image" class="rounded-circle">
                    </span>
                    <span>
                        <span class="account-user-name">Dominic Keller</span>
                        <span class="account-position">Founder</span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                    <!-- item-->
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-circle me-1"></i>
                        <span>My Account</span>
                    </a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="mdi mdi-logout me-1"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>

        </ul>
        <button class="button-menu-mobile open-left">
            <i class="mdi mdi-menu"></i>
        </button>
        <h4 class="mt-27">Users</h4>
    </div> --}}
    <!-- end Topbar -->

    <div class="container-fluid">
        <div class="float-right mt-3">
            <a href="{{ route('admin.users.create') }}" class="btn btn-success mb-2">Add User</a>
        </div>
        <div class="table-responsive mt-2" style="clear: both">
            <table class="table-panel table table-bordered table-centered mb-0">
                <thead>
                    <tr>
                        <th><strong>ID</strong></th>
                        <th><strong>Name</strong></th>
                        <th><strong>Role</strong></th>
                        <th class="text-center" style="min-width: 120px"><strong>Action</strong></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                      <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                        <td>@if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                               {{ $v }}
                            @endforeach
                          @endif</td>
                        <td class="text-center" style="min-width: 120px">
                            @if($user->id != 1)
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.users.edit',$user->id) }}"><i class="dripicons-pencil"></i></a>
                             <a class="ml-2 btn btn-danger btn-sm" href="#" onclick="confirmDelete({{ $user->id }})"><i class="dripicons-trash"></i></a>

                            <form id='delete-form{{ $user->id }}'
                                action='{{ route('admin.users.destroy', $user->id) }}'
                                method='POST'>
                                <input type='hidden' name='_token'
                                value='{{ csrf_token() }}'>
                                <input type='hidden' name='_method' value='DELETE'>
                            </form>
                            @endif
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
@push('scripts')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    function confirmDelete(no) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form' + no).submit();
            }
        })
    };
</script>
@endpush