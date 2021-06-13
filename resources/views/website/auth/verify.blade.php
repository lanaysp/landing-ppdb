@extends('website.auth.app')
@section('content')
<section class="section">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Aktivasi Akun</h4>
                    </div>
                    <div class="card-body">
                        @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Kami Telah Mengirimkan Kembali Email Aktivasi
                        </div>
                        @endif

                        Silahkan Check Pesan Email, Lalu Aktifasi Dengan Cara Click Link Didalamnya.
                        Jika Email Belum Ada, Anda Dapat Kembali Meng-click Tulisan dibawah ini ,
                        <div class="row mt-5">
                            <div class="col-6">
                                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Minta Kembali Email Aktivasi</button>
                                </form>
                            </div>
                            <div class="col-6">
                                <a href="{{route('logout')}}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();" class="btn btn-danger btn-lg btn-block">Kembali Ke Home</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection