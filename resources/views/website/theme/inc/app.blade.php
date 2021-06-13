<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Etnicode School</title>
  <meta name="description" content="{{$sett->meta_description}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?= Session::token(); ?>">
    <link rel="shortcut icon" type="image/x-icon" href="{{my_asset($sett->website_logo)}}">

  <!-- Favicons -->
  {{-- <link href="assets/img/favicon.png" rel="icon"> --}}
  {{-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{my_asset('website/theme/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{my_asset('website/theme/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{my_asset('website/theme/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{my_asset('website/theme/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{my_asset('website/theme/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{my_asset('website/theme/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{my_asset('website/theme/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{my_asset('plugins/toastr/toastr.min.css')}}">
  <link rel="stylesheet" href="{{my_asset('website/theme/assets1/css/magnific-popup.css')}}">

  <!-- Template Main CSS File -->
  <link href="{{my_asset('website/theme/assets/css/style.css')}}" rel="stylesheet">
  <style>
    #hero {
  width: 100%;
  height: 80vh;
  /* background:  top center !important; */
  background-size: cover;
  position: relative;
}
  </style>
</head>

<body>

    @include('website.theme.inc.header')
        @yield('content')
    @include('website.theme.inc.footer')


  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
  <div id="preloader"></div>

  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <!-- Vendor JS Files -->
  <script src="{{my_asset('website/theme/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{my_asset('website/theme/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{my_asset('website/theme/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{my_asset('website/theme/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{my_asset('website/theme/assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{my_asset('website/theme/assets/vendor/counterup/counterup.min.js')}}"></script>
  <script src="{{my_asset('website/theme/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{my_asset('website/theme/assets/vendor/aos/aos.js')}}"></script>

  <script src="{{my_asset('website/theme/assets1/js/jquery.magnific-popup.js')}}" defer></script>


  <!-- Template Main JS File -->
  <script src="{{my_asset('website/theme/assets/js/main.js')}}"></script>

  {{-- <script src="{{my_asset('js/app.js')}}" defer></script> --}}


    <script src="{{my_asset('plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{my_asset('js/evolution.js')}}" defer></script>
    @yield('script')
    @livewireScripts

</body>

</html>
