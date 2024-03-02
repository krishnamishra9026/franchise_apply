<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="favicon.png">

    <!-- App css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet" type="text/css" id="light-style" />
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
    
    @yield('head')
</head>

<body class="loading"
    data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <div class="wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.includes.sidebar')
        <!-- ========== Left Sidebar End ============ -->

        <!-- ========== Content Section Start ======= -->
        <div class="content-page">
            <div class="content">
                @include('admin.includes.navbar')
                @yield('content')
            </div>
        </div>
        <!-- ========== Content Section End ========= -->

    </div>
    {{-- @include('admin.includes.end-bar') --}}
    @include('admin.includes.script')
    @push('scripts')
    <script type="text/javascript" src="{{ asset('assets/js/vendor/summernote-bs4.min.js') }}"></script>
    @endpush
</body>

</html>