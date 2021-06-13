{{-- <!DOCTYPE html>
<html lang="en">
<!-- START: Head-->

<head>
    <meta charset="UTF-8">
    <title>Verification Product License</title>
    <link rel="shortcut icon" href="{{my_asset('admin/users/images/favicon.ico')}}" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="{{my_asset('admin/theme/css/app.min.css')}}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{my_asset('admin/theme/css/style.css')}}">
    <link rel="stylesheet" href="{{my_asset('admin/theme/css/components.css')}}">
    <link rel='shortcut icon' type='image/x-icon' href="{{my_asset('admin/theme/img/favicon.ico')}}" />
    <!-- END: Custom CSS-->
</head>
<!-- END Head-->

<!-- START: Body-->

<body id="main-container" class="default">
    <!-- START: Main Content-->
    <div class="container">

        <div class="row vh-100 justify-content-between align-items-center">
            <div class="col-12">
                <section class="section">
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h4>Verification License Product</h4>
                                    </div>
                                    <div class="card-body">
                                        @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                        @endif
                                        <form method="POST" action="{{ route('create.license') }}" class="needs-validation" novalidate="">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label for="text">Invoice Pembelian</label>
                                                <input  type="text" class="form-control" name="no_invoice" tabindex="1" required autofocus>
                                                <div class="invalid-feedback">
                                                    Please fill in your Invoice Number
                                                </div>
                                                @error('no_invoice')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <div class="d-block">
                                                    <label for="password" class="control-label">Serial Number</label>
                                                </div>
                                                <input type="text" class="form-control" name="license" tabindex="2" required>
                                                @error('license')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                                    Kirim Verifikasi
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="mt-5 text-muted text-center">
                                    Kunjungi ? <a target="_blank" href="https://evolution-school.com/login">Untuk Membuat License</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>
    <!-- END: Content-->

    <script src="{{my_asset('admin/js/app.min.js')}}"></script>
    <script src="{{my_asset('admin/bundles/jquery-ui/jquery-ui.min.js')}}"></script>

    <script src="{{my_asset('admin/js/scripts.js')}}"></script>
    <script src="{{my_asset('admin/js/custom.js')}}"></script>

    <script src="{{my_asset('plugins/sweetalert/sweetalert2.all.min.js')}}"></script>
    <script src="{{my_asset('plugins/sweetalert/dede.js')}}"></script>
    <!-- END: Template JS-->
</body>
<!-- END: Body-->

</html> --}}
