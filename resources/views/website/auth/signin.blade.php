@extends('website.auth.app')
@section('content')

{{-- @include('backend.partials.validation') --}}
<form method="POST" action="{{route('login')}}" class="row row-eq-height lockscreen  mt-5 mb-5">
    {{csrf_field()}}
    <div class="lock-image col-12 col-sm-5" style="background-image: url(../image);"></div>
    <div class="login-form col-12 col-sm-7">
        <div class="form-group mb-3">
            <label for="emailaddress">Email address</label>
            <input class="form-control" type="email" id="emailaddress" name="email" required="" placeholder="Masukkan Email Anda">
        </div>

        <div class="form-group mb-3">
            <label for="password">Password</label>
            <input class="form-control" type="password" required="" name="password" id="password" placeholder="Masukkan Password Anda">
        </div>

        <div class="form-group mb-3">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="remember" class="custom-control-input" id="checkbox-signin" checked="">
                <label class="custom-control-label" for="checkbox-signin">Ingatkan Saya</label>
            </div>
        </div>

        <div class="form-group mb-0">
            <button class="btn btn-success" type="submit"> Log In </button>
        </div>

        <div class="mt-2">Belum Punya Akun ? <a href="{{route('register')}}">Buat Akun Sekarang</a></div>
        <div class="mt-2">Lupa Password ? <a href="{{ route('password.request') }}">Pulihkan Password</a></div>
    </div>
</form>
@endsection
