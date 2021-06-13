<?php

use Illuminate\Support\Facades\Session;
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{$page}}</title>
    <meta name="description" content="{{$sett->meta_description}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?= Session::token(); ?>">
    <!-- Favicon -->
    <link href="{{my_asset('website/theme2/img/favicon.ico')}}" rel="shortcut icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{my_asset('website/theme2/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{my_asset('website/theme2/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{my_asset('website/theme2/css/themify-icons.css')}}" />
    <link rel="stylesheet" href="{{my_asset('website/theme2/css/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{my_asset('website/theme2/css/animate.css')}}" />
    <link rel="stylesheet" href="{{my_asset('website/theme2/css/owl.carousel.css')}}" />
    <link rel="stylesheet" href="{{my_asset('website/theme2/css/style.css')}}" />
    <link rel="stylesheet" href="{{my_asset('plugins/toastr/toastr.min.css')}}">
    @livewireStyles
</head>

<body>
    <!-- header section -->
    <header class="header-section">
        <div class="container">
            <!-- logo -->
            <a href="{{route('home')}}" class="site-logo"><img src="{{my_asset($sett->dark_logo)}}" alt=""></a>
            <div class="nav-switch">
                <i class="fa fa-bars"></i>
            </div>
            <div class="header-info">
                <div class="hf-item">
                    <i class="fa fa-phone"></i>
                    <p><span>Phone Number:</span>{{$sett->school_phone}}</p>
                </div>
                <div class="hf-item">
                    <i class="fa fa-map-marker"></i>
                    <p><span>School Address:</span>{{$sett->school_address}}</p>
                </div>
            </div>
        </div>
    </header>
    <!-- header section end-->


    <!-- Header section  -->
    <nav class="nav-section">
        <div class="container">
            <div class="nav-right">
                @if(Auth()->user())
                @if(Auth()->user()->type_account == 'administrator')
                <a href="{{route('dashboard')}}"  target="_blank"><i class="fa fa-desktop"></i> Dashboard </a>
                @elseif(Auth()->user()->type_account == 'ppdb')
                <a href="{{route('ppdb.dashboard')}}"  target="_blank"><i class="fa fa-desktop"></i> Dashboard </a>
                @endif
                @else
                <a href="{{route('register')}}" target="_blank"><i class="fa fa-lock"></i> PPDB Register</a>
                <a href="{{route('login')}}"  target="_blank"><i class="fa fa-sign-in"></i> Login </a>
                @endif


            </div>
            <ul class="main-menu">
                <li <?= $page == "Home Page" ? 'class="active"' : null; ?>><a href="{{route('home')}}">Home</a></li>
                @if($sett->about_appear == 1)
                <li <?= $page == "Visi Misi" ? 'class="active"' : null; ?>><a href="{{ route('vission')}}">About Us</a></li>
                @endif
                @if($sett->activity_appear)
                <li <?= $page == "List Kegiatan" || $page == "Detail Kegiatan" ? 'class="active"' : null; ?>><a href="{{route('event.list',['list'])}}">Kegiatan</a></li>
                @endif
                @if($sett->news_appear)
                <li <?= $page == "List Berita" || $page == "Detail Berita" ? 'class="active"' : null; ?>><a href="/news/list">Berita</a></li>
                @endif
                @if($sett->contact_appear)
                <li <?= $page == "Kontak Sekolah" ? 'class="active"' : null; ?>><a href="{{route('contact')}}">Kontak</a></li>
                @endif
            </ul>
        </div>
    </nav>
    <!-- Header section end -->
    @yield('content')


    <!-- Newsletter section -->
    <section class="newsletter-section">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-7">
                    <div class="section-title mb-md-0">
                        <h3>Subcribe</h3>
                        <p>Subcribe Untuk Mendukung Sekolah Kami</p>
                    </div>
                </div>
                <div class="col-md-7 col-lg-5">
                    <div class="newsletter">
                        <input type="email" id="emailSub" placeholder="Masukkan Email Anda">
                        <button class="site-btn sendSubcribe">SUBSCRIBE</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Newsletter section end -->

    <!-- Footer section -->
    @php
    use App\PageBuilder;
    @endphp
    <footer class="footer-section">
        <div class="container footer-top">
            <div class="row">
                <!-- widget -->
                <div class="col-sm-6 col-lg-6 footer-widget">
                    <div class="about-widget">
                        <img src="{{my_asset($sett->website_logo)}}" alt="">
                        <p>{{$sett->footer_text}}</p>
                        <div class="social pt-1">
                            <a href="{{$sett->twitter}}"><i class="fa fa-twitter-square"></i></a>
                            <a href="{{$sett->twitter}}"><i class="fa fa-facebook-square"></i></a>
                            <a href="{{$sett->twitter}}"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>

                <!-- widget -->
                <div class="col-sm-6 col-lg-6 footer-widget">
                    <h6 class="fw-title">Kontak Info</h6>
                    <ul class="contact">
                        <li>
                            <p><i class="fa fa-map-marker"></i> {{$sett->school_address}}</p>
                        </li>
                        <li>
                            <p><i class="fa fa-phone"></i> {{$sett->school_phone}}</p>
                        </li>
                        <li>
                            <p><i class="fa fa-envelope"></i> {{$sett->school_email}}</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- copyright -->
        <div class="copyright">
            <div class="container">
                <p>
                    {{$sett->copy_right}}
                </p>
            </div>
        </div>
    </footer>
    <!-- Footer section end-->



    <!--====== Javascripts & Jquery ======-->
    <script src="{{my_asset('website/theme2/js/jquery-3.2.1.min.js')}}" defer></script>
    <script src="{{my_asset('website/theme2/js/owl.carousel.min.js')}}" defer></script>
    <script src="{{my_asset('website/theme2/js/jquery.countdown.js')}}" defer></script>
    <script src="{{my_asset('website/theme2/js/masonry.pkgd.min.js')}}" defer></script>
    <script src="{{my_asset('website/theme2/js/magnific-popup.min.js')}}" defer></script>
    <script src="{{my_asset('website/theme2/js/main.js')}}" defer></script>
    <script src="{{my_asset('plugins/toastr/toastr.min.js')}}" defer></script>
    <script src="{{my_asset('js/evolution.js')}}" defer></script>
    <script src="{{my_asset('js/app.js')}}" defer></script>
    @livewireScripts
</body>

</html>
