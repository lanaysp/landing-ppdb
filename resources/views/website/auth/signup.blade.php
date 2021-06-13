@extends('website.auth.app')
@section('content')
<section class="section">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Daftar Akun</h4>
                    </div>
                    <div class="card-body">
                        {{-- @include('backend.partials.validation') --}}
                        <form method="POST" action="{{route('register')}}">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="first_name">Nama Awal</label>
                                    <input id="first_name" type="text" placeholder="Ex: Muhammad" class="form-control" name="first_name" value="{{old('first_name')}}" required autofocus>
                                </div>
                                <div class="form-group col-4">
                                    <label for="middle_name">Nama Tengah</label>
                                    <input id="middle_name" type="text" placeholder="Ex: Harum" class="form-control" name="middle_name" value="{{old('middle_name')}}">
                                </div>
                                <div class="form-group col-4">
                                    <label for="last_name">Nama Akhir</label>
                                    <input id="last_name" type="text" placeholder="Ex: Sidik" class="form-control" name="last_name" value="{{old('last_name')}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" placeholder="Ex: harumsidik@gmail.com" class="form-control" required name="email" value="{{old('email')}}">
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="phone">No Phonsel</label>
                                    <input id="phone" type="number" placeholder="Ex: 6285794298878" class="form-control" required name="phone" value="{{old('phone')}}">
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="password" class="d-block">Password</label>
                                    <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                                    <div id="pwindicator" class="pwindicator">
                                        <div class="bar"></div>
                                        <div class="label"></div>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="password2" class="d-block">Konfirmasi Password</label>
                                    <input id="password2" type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Kamu Adalah ?</label>
                                <select class="form-control" name="role">
                                    <option value="1">Wali Murid / Orangtua</option>
                                    <option value="2">Murid / Siswa</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                                    <label class="custom-control-label" for="agree">Saya Setuju Dengan semua ketentuan berlaku</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-lg btn-block">
                                    Daftar Sekarang
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="mb-4 text-muted text-center">
                        Sudah Punya Akun ? <a href="{{route('login')}}">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
