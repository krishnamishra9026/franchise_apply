@extends('layouts.admin')
@section('title', 'View Stock')
@section('content')

<div class="content">
    <!-- Topbar Start -->
    <div class="navbar-custom">
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
        <h4 class="mt-27">View Stock</h4>
    </div>
    <!-- end Topbar -->

    <div class="container-fluid">
        
        <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"></h4>
                    </div>

                    @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif

                    @if(Session::has('error_msg'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('error_msg') }}</p>
                    @endif

                    @if ($errors->count())
                    @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                    @endif

                    <div class="card-content">
                        <div class="card-body import-file">
                            <form class="form form-vertical"
                                  action="{{ route('admin.stock-import') }}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-12">
                                        

                                        <div class="import_file">

                                            <div class="mb-1 mt-2">
                                                <p class="text-uppercase">SAMPLE FILE</p>
                                                <a href="{{route('admin.stock-sample.file')}}" class="btn btn-primary fw-bold text-uppercase">
                                                    <i data-feather="file-text"></i> Download SAMPLE FILE
                                                </a>

                                            </div>


                                            <div class="mb-1">
                                                <label for="import_file" class="form-label">Import File</label>
                                                <div class="us-file-zone us-clickable">
                                                    <input type="file" name="import_file" class="us-file upload-file" id="import_file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                                                    <div class="us-file-message">Click here to upload</div>
                                                    <div class="us-file-footer">
                                                        The file must contains <code>phone</code> column, include a <code>country code</code> at the beginning for a successful import.
                                                        Supported file: <code>csv, xls, xlsx</code>
                                                        Date Columns, only these formats are supported: 2/1/90, 2/1/1990, and 1990-01-21.
                                                    </div>
                                                </div>
                                                @error('import_file')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                                @enderror

                                            </div>


                                            <div class="mb-1">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input type="checkbox" checked value="true" name="header" class="form-check-input">
                                                    <label class="form-check-label">File contains header row?</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="paste_text">

                                         

                                            <div class="mb-1" style="display: none;">
                                                <div class="btn-group btn-group-sm recipients" role="group">
                                                    <input type="radio" class="btn-check" name="delimiter" value="," id="comma" autocomplete="off" checked/>
                                                    <label class="btn btn-outline-primary" for="comma">, ({{ __('locale.labels.comma') }})</label>

                                                    <input type="radio" class="btn-check" name="delimiter" value=";" id="semicolon" autocomplete="off"/>
                                                    <label class="btn btn-outline-primary" for="semicolon">; ({{ __('locale.labels.semicolon') }})</label>

                                                    <input type="radio" class="btn-check" name="delimiter" value="|" id="bar" autocomplete="off"/>
                                                    <label class="btn btn-outline-primary" for="bar">| ({{ __('locale.labels.bar') }})</label>

                                                    <input type="radio" class="btn-check" name="delimiter" value="tab" id="tab" autocomplete="off"/>
                                                    <label class="btn btn-outline-primary" for="tab">{{ __('locale.labels.tab') }}</label>

                                                    <input type="radio" class="btn-check" name="delimiter" value="new_line" id="new_line" autocomplete="off"/>
                                                    <label class="btn btn-outline-primary" for="new_line">{{ __('locale.labels.new_line') }}</label>

                                                </div>

                                                @error('delimiter')
                                                <p><small class="text-danger">{{ $message }}</small></p>
                                                @enderror
                                            </div>

                                        </div>


                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mt-2 mb-1">
                                            <i data-feather="save"></i> Import
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

    </div>
</div>

@endsection