@extends('user.app_ppdb')
@section('content')
@section('style')
<link rel="stylesheet" href="{{my_asset('plugins/dropify/css/dropify.min.css')}}">
@endsection
<div class="row">
    <div class="col-12 mt-3">
        <div class="position-relative">
            <div class="background-image-maker py-5"></div>
            <div class="holder-image">
                @if($about == '')
                <img src="{{my_asset('admin/users/images/portfolio13.jpg')}}" alt="" class="img-fluid d-none">
                @else
                @if($about->cover_image == null)
                <img src="{{my_asset('admin/users/images/portfolio13.jpg')}}" alt="" class="img-fluid d-none">
                @else
                <img src="{{my_asset($about->cover_image)}}" alt="" class="img-fluid d-none">
                @endif
                @endif
            </div>

            <div class="position-relative px-3 py-5">
                <div class="media d-md-flex d-block">
                    @if(Auth()->user()->image == null)
                    <a href="#"><img src="{{my_asset('admin/theme/img/user.jpg')}}" width="100" alt="" class="img-fluid rounded-circle"></a>
                    @else
                    <a href="#"><img src="{{my_asset(Auth()->user()->image)}}" width="100" alt="" class="img-fluid rounded-circle"></a>
                    @endif
                    <div class="media-body z-index-1">
                        <div class="pl-4">
                            <h1 class="display-4 text-uppercase text-white mb-0">{{Auth()->user()->first_name}} {{Auth()->user()->middle_name}} {{Auth()->user()->last_name}} </h1>
                            <h6 class="text-uppercase text-white mb-0">
                                @if(Auth()->user()->role == 1)
                                Wali Murid
                                @elseif($data->status == 2)
                                Siswa
                                @endif
                            </h6>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Pilihan -->
        <div class="row mt-5">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a href="#about-me" data-toggle="tab" class="nav-link active">General Information</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#profile-settings" data-toggle="tab" class="nav-link">Other Information</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="about-me" class="tab-pane fade active show ">
                                        <form method="POST" action="{{route('pengguna.change.profile')}}" enctype="multipart/form-data" class="mt-5">
                                            {{csrf_field()}}
                                            <div class="row">
                                                <div class="form-group col-12">
                                                    <label for="first_name">Nama Awal</label>
                                                    <input id="first_name" type="text" class="form-control" pattern="[A-Za-z]{3,}" title="Tuliskan Format Nama Dengan Benar, minimal 3 karakter" name="first_name" value="{{Auth()->user()->first_name}}" required autofocus>
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="middle_name">Nama Tengah</label>
                                                    <input id="middle_name" type="text" placeholder="Ex: Harum" pattern="[A-Za-z]{0,}" title="Tuliskan Format Nama Dengan Benar" class="form-control" name="middle_name" value="{{Auth()->user()->middle_name}}">
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="last_name">Nama Akhir</label>
                                                    <input id="last_name" type="text" placeholder="Ex: Sidik" pattern="[A-Za-z]{0,}" title="Tuliskan Format Nama Dengan Benar" class="form-control" name="last_name" value="{{Auth()->user()->last_name}}">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-12">
                                                    <label for="email">Email</label>
                                                    <input id="email" type="email" class="form-control" required readonly value="{{Auth()->user()->email}}">
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="phone">No Phonsel</label>
                                                    <input id="phone" type="number" class="form-control" required name="phone" value="{{Auth()->user()->phone}}">
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>

                                                <div class="form-group col-12">
                                                    <label for="phone">Photo Profile</label>
                                                    <input class="dropify" type="file" name="image" data-default-file="{{my_asset(Auth()->user()->image)}}">
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                                    Simpan Perubahan
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="profile-settings" class="tab-pane fade">
                                        <div class="pt-3">
                                            <div class="settings-form">
                                                @if($about == '')
                                                <form action="{{route('pengguna.change.detail')}}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label>Provinsi</label>
                                                            <input type="text" placeholder="Provinsi Tempat Tinggal" name="province" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Kota</label>
                                                            <input type="text" name="city" placeholder="Kota Tempat Tinggal" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label>Alamat Lengkap</label>
                                                            <textarea class="form-control" name="address_detail"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Tentang Saya</label>
                                                            <textarea class="form-control" name="detail_pengguna"></textarea>
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <br>
                                                        <label class="control-label">Background Profile </label>
                                                        <input class="dropify" type="file" name="cover_image" data-default-file="">
                                                    </div>
                                                    <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                                                </form>
                                                @else
                                                <form action="{{route('pengguna.change.detail')}}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label>Provinsi</label>
                                                            <input type="text" placeholder="Provinsi Tempat Tinggal" name="province" value="{{$about->province}}" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Kota</label>
                                                            <input type="text" name="city" placeholder="Kota Tempat Tinggal" value="{{$about->city}}" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label>Alamat Lengkap</label>
                                                            <textarea class="form-control" name="address_detail">{{$about->address_detail}}</textarea>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Tentang Saya</label>
                                                            <textarea class="form-control" name="detail_pengguna">{{$about->detail_pengguna}} </textarea>
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <br>
                                                        <label class="control-label">Background Profile </label>
                                                        <input class="dropify" type="file" name="cover_image" data-default-file="{{my_asset($about->cover_image)}}">
                                                    </div>
                                                    <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                                                </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
<script src="{{my_asset('plugins/dropify/js/dropify.min.js')}}"></script>
<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();
    });
</script>
@endsection
@endsection