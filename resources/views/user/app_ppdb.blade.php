<!DOCTYPE html>
<html lang="en">
<!-- START: Head-->
<?php

use App\Pengguna\Notification;
use App\Pengguna\UserSettingsTheme;
use App\SettPpdb;
use App\SettWebsite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

$sett   = SettWebsite::first();
$setts  = SettPpdb::first();
$theme  = UserSettingsTheme::where('user_id', Auth()->user()->id)->first();
$pemberitahuan = Notification::where('user_id', Auth()->user()->id)->where('status', '0')->limit(5)->get();

?>

<head>
    <meta charset="UTF-8">
    <title>{{$page}} - {{$sett->school_name}} </title>
    <link rel="shortcut icon" href="{{my_asset('admin/users/images/favicon.ico')}}" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <?=
    $page == "Mading Board" ? '<meta name="csrf-token" content="' . Session::token() . '">' : null; ?>
    <link rel="stylesheet" href="{{my_asset('admin/users/vendors/ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{my_asset('admin/users/vendors/weather-icons/css/pe-icon-set-weather.min.css')}}">
    <!-- START: Template CSS-->
    <link rel="stylesheet" href="{{my_asset('admin/users/vendors/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{my_asset('admin/users/vendors/jquery-ui/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{my_asset('admin/users/vendors/jquery-ui/jquery-ui.theme.min.css')}}">
    <link rel="stylesheet" href="{{my_asset('admin/users/vendors/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{my_asset('admin/users/vendors/flags-icon/css/flag-icon.min.css')}}">
    @yield('style')
    <link rel="stylesheet" href="{{my_asset('admin/users/vendors/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{my_asset('admin/users/vendors/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" href="{{my_asset('admin/users/vendors/toastr/toastr.min.css')}}">
    <link rel="stylesheet" href="{{my_asset('admin/users/css/customer_service.css')}}">
    <link rel="stylesheet" href="{{my_asset('admin/users/css/main.css')}}">

</head>
<!-- END Head-->

<!-- START: Body-->
@if($theme == null)

<body id="main-container" class="default default semi-dark horizontal-menu">
    @else
    <?php
    if ($theme->theme_style == '1') {
        $style  = 'light';
    } elseif ($theme->theme_style == '2') {
        $style = 'dark';
    } elseif ($theme->theme_style == '3') {
        $style = 'semi-dark';
    }

    if ($theme->theme_color == '1') {
        $color  = '#1e3d73';
    } elseif ($theme->theme_color == '2') {
        $color = '#0bb2d4';
    } elseif ($theme->theme_color == '3') {
        $color = '#17b3a3';
    } elseif ($theme->theme_color == '4') {
        $color = '#eb6709';
    } elseif ($theme->theme_color == '5') {
        $color = '#3e8ef7';
    }

    if ($theme->theme_menu == '2') {
        $side   = '';
    } elseif ($theme->theme_menu == '1') {
        $side   = 'horizontal-menu';
    }
    ?>

    <body id="main-container" class="default default {{$style}}   {{$side}}" style="--primarycolor:{{$color}};">
        @endif

        <!-- START: Pre Loader-->
        <div class="se-pre-con">
            <div class="loader"></div>
        </div>
        <!-- END: Pre Loader-->

        <!-- START: Header-->
        <div id="header-fix" class="header fixed-top">
            <div class="site-width">
                <nav class="navbar navbar-expand-lg  p-0">
                    <div class="navbar-header  ">
                        <a href="{{route('ppdb.dashboard')}}" class="horizontal-logo text-left">
                            @if($theme != null)
                            @if($theme->theme_style == '1' || $theme->theme_menu == '2')
                            <img src="{{my_asset($sett->dark_logo)}}" width="50px">
                            @else
                            <img src="{{my_asset($sett->website_logo)}}" width="50px">
                            @endif
                            @endif
                        </a>
                    </div>
                    <div class="navbar-header h4 mb-0 text-center h-100 collapse-menu-bar">
                        <a href="#" class="sidebarCollapse" id="collapse"><i class="icon-menu"></i></a>
                    </div>


                    <div class="navbar-right ml-auto h-100">
                        <ul class="ml-auto p-0 m-0 list-unstyled d-flex top-icon h-100">
                            <li class="dropdown align-self-center d-inline-block">
                                <a href="#" class="nav-link" data-toggle="dropdown" aria-expanded="false"><i class="icon-bell h4"></i>
                                    <span class="badge badge-default"> <span class="ring">
                                        </span><span class="ring-point">
                                        </span> </span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right border   py-0">
                                    @foreach($pemberitahuan as $notif)
                                    <li>
                                        <a class="dropdown-item px-2 py-2 border border-top-0 border-left-0 border-right-0" href="{{route('ppdb.notif')}}">
                                            <div class="media">
                                                <img src="{{my_asset(Auth()->user()->image)}}" alt="" class="d-flex mr-3 img-fluid rounded-circle w-50">
                                                <div class="media-body">
                                                    <p class="mb-0 text-success"><?= substr($notif->type, 0, 15); ?></p>
                                                    {{$notif->created_at}}
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    @endforeach

                                    <li><a class="dropdown-item text-center py-2" href="{{route('ppdb.notif')}}"> Lihat Semua <i class="icon-arrow-right pl-2 small"></i></a></li>
                                </ul>
                            </li>
                            <li class="dropdown user-profile align-self-center d-inline-block">
                                <a href="#" class="nav-link py-0" data-toggle="dropdown" aria-expanded="false">
                                    <div class="media">
                                        <img src="{{my_asset(Auth()->user()->image)}}" alt="" class="d-flex img-fluid rounded-circle" width="29">
                                    </div>
                                </a>

                                <div class="dropdown-menu border dropdown-menu-right p-0">
                                    <a href="#" data-toggle="modal" data-target="#password" class="dropdown-item px-2 align-self-center d-flex">
                                        <span class="ti-unlock mr-2 h6 mb-0"></span> Ubah Password</a>
                                    <a href="{{route('pengguna.profile')}}" class="dropdown-item px-2 align-self-center d-flex">
                                        <span class="icon-user mr-2 h6 mb-0"></span> View Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="{{route('ppdb.logActivity')}}" class="dropdown-item px-2 align-self-center d-flex">
                                        <span class="icon-globe mr-2 h6 mb-0"></span> Log Activity</a>
                                    <a href="{{route('pengguna.ppdb.setting')}}" class="dropdown-item px-2 align-self-center d-flex">
                                        <span class="icon-settings mr-2 h6 mb-0"></span> Pengaturan Tampilan</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="dropdown-item px-2 text-danger align-self-center d-flex">
                                        <span class="icon-logout mr-2 h6  mb-0"></span> Sign Out</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>

                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- END: Header-->

        <!-- START: Main Menu-->
        @include('user.partials.sidebar')
        <!-- END: Main Menu-->

        <!-- START: Main Content-->
        <main>
            <div class="container-fluid site-width">
                @if ($message = Session::get('flash'))
                <div class="flash-data" data-flashdata="{{ $message }}"></div>
                @endif

                @if ($message = Session::get('gagal'))
                <div class="gagal" data-gagal="{{ $message }}"></div>
                @endif
                <!-- START: Breadcrumbs-->
                <div class="row">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto">
                                <h4 class="mb-0">{{$page}}</h4>
                                <p>Selamat Datang Kembali <b>{{Auth()->user()->first_name}} {{Auth()->user()->middle_name}} {{Auth()->user()->last_name}}</b> </p>
                            </div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a href="{{route('ppdb.dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">{{$page}}</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->
                @include('backend.partials.validation')
                @yield('content')
                <!-- END: Card DATA-->
            </div>
        </main>
        <!-- END: Content-->
        <!-- START: Footer-->
        <footer class="site-footer">
            {{$sett->copy_right}}
        </footer>
        <!-- END: Footer-->
        @include('backend.modal.password')
        @if($setts->cs == 'on')
        @include('user.partials.customer_service')
        @endif

        <!-- START: Back to top-->
        <a href="#" class="scrollup text-center">
            <i class="icon-arrow-up" style="color: white;"></i>
        </a>
        <!-- END: Back to top-->


        <!-- START: Template JS-->
        <script src="{{my_asset('admin/users/vendors/jquery/jquery-3.3.1.min.js')}}"></script>
        <script src="{{my_asset('admin/users/vendors/jquery-ui/jquery-ui.min.js')}}"></script>
        <script src="{{my_asset('admin/users/vendors/moment/moment.js')}}"></script>
        <script src="{{my_asset('admin/users/vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{my_asset('admin/users/vendors/slimscroll/jquery.slimscroll.min.js')}}"></script>
        <!-- END: Template JS-->

        <script src="{{my_asset('admin/users/vendors/toastr/toastr.min.js')}}"></script>
        <script src="{{my_asset('admin/users/js/evolution.js')}}"></script>

        <!-- START: APP JS-->
        <script src="{{my_asset('admin/users/js/app.js')}}"></script>
        <!-- END: APP JS-->

        @yield('script')
        @if($setts->cs == 'on')
        <script>
            $(document).on("click", "#send-it", function() {
                var a = document.getElementById("chat-input");
                if ("" != a.value) {
                    var b = $("#get-number").text(),
                        c = document.getElementById("chat-input").value,
                        d = "https://web.whatsapp.com/send",
                        e = b,
                        f = "&text=" + c;
                    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) var d = "whatsapp://send";
                    var g = d + "?phone=" + e + f;
                    window.open(g, '_blank')
                }
            }), $(document).on("click", ".informasi", function() {
                document.getElementById("get-number").innerHTML = $(this).children(".my-number").text(), $(".start-chat,.get-new").addClass("show").removeClass("hide"), $(".home-chat,.head-home").addClass("hide").removeClass("show"), document.getElementById("get-nama").innerHTML = $(this).children(".info-chat").children(".chat-nama").text(), document.getElementById("get-label").innerHTML = $(this).children(".info-chat").children(".chat-label").text()
            }), $(document).on("click", ".close-chat", function() {
                $("#whatsapp-chat").addClass("hide").removeClass("show")
            }), $(document).on("click", ".blantershow-chat", function() {
                $("#whatsapp-chat").addClass("show").removeClass("hide")
            });
        </script>
        @endif
    </body>
    <!-- END: Body-->

</html>
