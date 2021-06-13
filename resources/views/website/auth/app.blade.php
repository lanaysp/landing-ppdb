<!DOCTYPE html>
<html lang="en">
<!-- START: Head-->

<head>
    <meta charset="UTF-8">
    <title>{{$page}}</title>
    <link rel="shortcut icon" href="{{my_asset('admin/users/images/favicon.ico')}}" />
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- START: Template CSS-->
    <link rel="stylesheet" href="{{my_asset('admin/users/vendors/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{my_asset('admin/users/vendors/jquery-ui/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{my_asset('admin/users/vendors/jquery-ui/jquery-ui.theme.min.css')}}">
    <link rel="stylesheet" href="{{my_asset('admin/users/vendors/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{my_asset('admin/users/vendors/flags-icon/css/flag-icon.min.css')}}">

    <!-- END Template CSS-->

    <!-- START: Page CSS-->
    <link rel="stylesheet" href="{{my_asset('admin/users/vendors/social-button/bootstrap-social.css')}}" />
    <!-- END: Page CSS-->

    <!-- START: Custom CSS-->
    <link rel="stylesheet" href="{{my_asset('admin/users/css/main.css')}}">
    <!-- END: Custom CSS-->
</head>
<!-- END Head-->

<!-- START: Body-->

<body id="main-container" class="default">
    <!-- START: Main Content-->
    <div class="container">
        @if ($message = Session::get('flash'))
        <div class="flash-data" data-flashdata="{{ $message }}"></div>
        @endif

        @if ($message = Session::get('gagal'))
        <div class="gagal" data-gagal="{{ $message }}"></div>
        @endif

        <div class="row vh-100 justify-content-between align-items-center">
            <div class="col-12">
                @yield('content')
            </div>

        </div>
    </div>
    <!-- END: Content-->

    <!-- START: Template JS-->
    <script src="{{my_asset('admin/users/vendors/jquery/jquery-3.3.1.min.js')}}"></script>
    <script src="{{my_asset('admin/users/vendors/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{my_asset('admin/users/vendors/moment/moment.js')}}"></script>
    <script src="{{my_asset('admin/users/vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{my_asset('admin/users/vendors/slimscroll/jquery.slimscroll.min.js')}}"></script>

    <script src="{{my_asset('plugins/sweetalert/sweetalert2.all.min.js')}}"></script>
    <script src="{{my_asset('plugins/sweetalert/dede.js')}}"></script>
    <!-- END: Template JS-->
</body>
<!-- END: Body-->

</html>