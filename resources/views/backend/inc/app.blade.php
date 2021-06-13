<?php

use App\Admin\SettGeneral;
use App\Contact;
use App\Pengguna\Notification;

$pengaturan     = SettGeneral::first();
$contactnoRead  = Contact::where('status', '0')->limit(5)->get();
$notifNoread    = Notification::where('role', 'administrator')->where('status', '0')->limit(5)->get();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{$pengaturan->school_name}} - {{$page}}</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{my_asset('admin/theme/css/app.min.css')}}">
    @yield('style')
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{my_asset('admin/theme/css/style.css')}}">
    <link rel="stylesheet" href="{{my_asset('admin/theme/css/components.css')}}">
    <link rel='shortcut icon' type='image/x-icon' href="{{my_asset('admin/theme/img/favicon.ico')}}" />
</head>

<body class="theme-{{$pengaturan->color_custom}} <?= $pengaturan->layout_dark == 2 ? 'dark' : 'light'; ?> <?= $pengaturan->sidebar_custom == 2 ? 'dark-sidebar' : 'light-sidebar'; ?> <?= $pengaturan->menu_custom == 'on' ? 'sidebar-mini' : null; ?>  ">

    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg									collapse-btn"> <i data-feather="menu"></i></a></li>
                        <li>
                            <form class="form-inline mr-auto">
                                <div class="search-element">
                                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                            <i data-feather="maximize"></i>
                        </a></li>
                    <li class="dropdown dropdown-list-toggle">
                        <a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle">
                            <i data-feather="mail" class="<?= count($contactnoRead) > 0 ? 'mailAnim' : null; ?>"></i>
                            <span class="badge <?= count($contactnoRead) > 0 ? 'headerBadge1' : null; ?>">
                            </span> </a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                            <div class="dropdown-header">
                                Messages
                                <div class="float-right">
                                    <a href="{{route('cms',['ContactReader'])}}">Tandai Telah Dibaca</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-message">
                                @foreach($contactnoRead as $contact)
                                <a href="{{route('cms.update.page',['contactDetail',$contact->id])}}" class="dropdown-item">
                                    <span class="dropdown-item-icon l-bg-orange text-white"> <i class="far fa-envelope"></i> </span>
                                    <span class="dropdown-item-desc"> <span class="message-user">{{$contact->contact_name}}</span>
                                        <span class="time messege-text">{{$contact->contact_subject}}</span>
                                        <span class="time">{{$contact->created_at}}</span>
                                    </span>
                                </a>
                                @endforeach
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="{{route('cms',['contact'])}}">Lihat Semua <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg"><i data-feather="bell"></i>
                        </a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                            <div class="dropdown-header">
                                Pemberitahuan
                                <div class="float-right">
                                    <a href="{{route('admin.notif.mark')}}">Tandai Telah Dibaca</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-icons">
                                @foreach($notifNoread as $notif)
                                <a href="#" class="dropdown-item"> <span class="dropdown-item-icon l-bg-purple text-white"> <i class="fas fa-bell"></i>
                                    </span> <span class="dropdown-item-desc"><b><?= substr($notif->description, 0, 50); ?></b> - {{$notif->created_at}}
                                    </span>
                                </a>
                                @endforeach
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="{{route('admin.notif')}}">Lihat Semua <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            @if(Auth()->user()->Employee->photo != null)
                            <img alt="image" src="{{my_asset(Auth()->user()->Employee->photo)}}" class="user-img-radious-style">
                            @else
                            <img alt="image" src="{{my_asset('admin/theme/img/user.png')}}" class="user-img-radious-style">
                            @endif

                            <span class="d-sm-none d-lg-inline-block"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">Hello, {{Auth()->user()->Employee->username}}</div>
                            <a href="{{route('admin.profile')}}" class="dropdown-item has-icon"> <i class="far										fa-user"></i> Profile
                            </a> <a href="#" data-toggle="modal" data-target="#password" class="dropdown-item has-icon"> <i class="fas fa-lock"></i>
                                Ubah Password
                            </a> <a href="{{route('setting',['general'])}}" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                                Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{route('logout')}}" class="dropdown-item has-icon text-danger proses" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            @include('backend.inc.sidebar')
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <ul class="breadcrumb breadcrumb-style">
                        <li class="breadcrumb-item">
                            <h4 class="page-title m-b-0">{{$page}}</h4>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('dashboard')}}">
                                <i data-feather="home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">{{$page}}</li>
                    </ul>


                    @include('backend.partials.validation')

                    @if ($message = Session::get('flash'))
                    <div class="flash-data" data-flashdata="{{ $message }}"></div>
                    @endif

                    @if ($message = Session::get('gagal'))
                    <div class="gagal" data-gagal="{{ $message }}"></div>
                    @endif

                    @yield('content')
            </div>
            @include('backend.modal.password')
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; {{date('Y')}}
                    <div class="bullet"></div> Develop By <a href="#">Dede Hidayatullah</a> Dibuat dengan <i style="color: red;" class="fa fa-heart"></i> & Basmallah
                </div>
                <div class="footer-right">
                </div>
            </footer>
        </div>
    </div>
    <script src="{{my_asset('admin/theme/js/app.min.js')}}"></script>
    <script src="{{my_asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    @yield('script')
    <script src="{{my_asset('admin/theme/js/scripts.js')}}"></script>
    <script src="{{my_asset('admin/theme/js/custom.js')}}"></script>
    <script src="{{my_asset('plugins/sweetalert/sweetalert2.all.min.js')}}"></script>
    <script src="{{my_asset('plugins/sweetalert/dede.js')}}"></script>
</body>

</html>