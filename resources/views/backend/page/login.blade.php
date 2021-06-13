<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> {{$page}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{my_asset('website/theme/assets/img/favicon.ico')}}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{my_asset('website/theme/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{my_asset('website/theme/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{my_asset('website/theme/assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{my_asset('website/theme/assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{my_asset('website/theme/assets/css/progressbar_barfiller.css')}}">
    <link rel="stylesheet" href="{{my_asset('website/theme/assets/css/gijgo.css')}}">
    <link rel="stylesheet" href="{{my_asset('website/theme/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{my_asset('website/theme/assets/css/animated-headline.css')}}">
    <link rel="stylesheet" href="{{my_asset('website/theme/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{my_asset('website/theme/assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{my_asset('website/theme/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{my_asset('website/theme/assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{my_asset('website/theme/assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{my_asset('website/theme/assets/css/style.css')}}">
</head>

<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{my_asset('website/theme/assets/img/logo/loder.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start-->


    <main class="login-body" data-vide-bg="{{my_asset('website/theme/assets/img/login-bg.mp4')}}">
        <!-- Login Admin -->
        <form class="form-default" action="{{route('login')}}" method="POST">
            {{csrf_field()}}
            <div class="login-form">
                <!-- logo-login -->
                <div class="logo-login">
                    <a href="{{route('admin.login')}}"><img src="{{my_asset('website/theme/assets/img/logo/loder.png')}}" alt=""></a>
                </div>
                <h2>Login Form</h2>
                <div class="form-input">
                    <label for="name">Email</label>
                    <input type="email" name="email">
                </div>
                <div class="form-input">
                    <label for="name">Password</label>
                    <input type="password" name="password">
                </div>
                <div class="form-input pt-30">
                    <input type="submit" name="submit" value="login">
                </div>

                <!-- Forget Password -->
                <a href="{{route('forget')}}" class="forget">Lupa Kata Sandi</a>
            </div>
        </form>
        <!-- /end login form -->
    </main>


    <script src="{{my_asset('website/theme/assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{my_asset('website/theme/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{my_asset('website/theme/assets/js/popper.min.js')}}"></script>
    <script src="{{my_asset('website/theme/assets/js/bootstrap.min.js')}}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{my_asset('website/theme/assets/js/jquery.slicknav.min.js')}}"></script>

    <!-- Video bg -->
    <script src="{{my_asset('website/theme/assets/js/jquery.vide.js')}}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{my_asset('website/theme/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{my_asset('website/theme/assets/js/slick.min.js')}}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{my_asset('website/theme/assets/js/wow.min.js')}}"></script>
    <script src="{{my_asset('website/theme/assets/js/animated.headline.js')}}"></script>
    <script src="{{my_asset('website/theme/assets/js/jquery.magnific-popup.js')}}"></script>

    <!-- Date Picker -->
    <script src="{{my_asset('website/theme/assets/js/gijgo.min.js')}}"></script>
    <!-- Nice-select, sticky -->
    <script src="{{my_asset('website/theme/assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{my_asset('website/theme/assets/js/jquery.sticky.js')}}"></script>
    <!-- Progress -->
    <script src="{{my_asset('website/theme/assets/js/jquery.barfiller.js')}}"></script>

    <!-- counter , waypoint,Hover Direction -->
    <script src="{{my_asset('website/theme/assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{my_asset('website/theme/assets/js/waypoints.min.js')}}"></script>
    <script src="{{my_asset('website/theme/assets/js/jquery.countdown.min.js')}}"></script>
    <script src="{{my_asset('website/theme/assets/js/hover-direction-snake.min.js')}}"></script>

    <!-- contact js -->
    <script src="{{my_asset('website/theme/assets/js/contact.js')}}"></script>
    <script src="{{my_asset('website/theme/assets/js/jquery.form.js')}}"></script>
    <script src="{{my_asset('website/theme/assets/js/jquery.validate.min.js')}}"></script>
    <script src="{{my_asset('website/theme/assets/js/mail-script.js')}}"></script>
    <script src="{{my_asset('website/theme/assets/js/jquery.ajaxchimp.min.js')}}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{my_asset('website/theme/assets/js/plugins.js')}}"></script>
    <script src="{{my_asset('website/theme/assets/js/main.js')}}"></script>

</body>

</html>
