@extends('backend.inc.app')
@section('content')
@section('style')
<link rel="stylesheet" href="{{my_asset('plugins/summernote/summernote-bs4.css')}}">
<link rel="stylesheet" href="{{my_asset('plugins/chocolat/dist/css/chocolat.css')}}">
<link rel="stylesheet" href="{{my_asset('plugins/dropify/css/dropify.min.css')}}">
@endsection
<div class="section-body">
    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-4">
            <div class="card author-box">
                <div class="card-body">
                    <div class="author-box-center">
                        <img alt="image" src="{{my_asset($data->image)}}" class="rounded-circle author-box-picture">
                        <div class="clearfix"></div>
                        <div class="author-box-name">
                            <a href="#"> {{$data->first_name}} {{$data->middle_name}} {{$data->last_name}}</a>
                        </div>
                        <div class="author-box-job">{{$data->email}}</div>
                    </div>

                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Personal Detail</h4>
                </div>
                <div class="card-body">
                    <div class="py-4">
                        <p class="clearfix">
                            <span class="float-left">
                                Nama
                            </span>
                            <span class="float-right text-muted">
                                {{$data->first_name}} {{$data->middle_name}} {{$data->last_name}}
                            </span>
                        </p>
                        <p class="clearfix">
                            <span class="float-left">
                                Ponsel
                            </span>
                            <span class="float-right text-muted">
                                {{$data->phone}}
                            </span>
                        </p>
                        <p class="clearfix">
                            <span class="float-left">
                                Sebagai
                            </span>
                            <span class="float-right text-muted">
                                @if($data->role == '1')
                                Wali Murid
                                @else
                                Murid
                                @endif
                            </span>
                        </p>

                    </div>

                </div>
            </div>
            @if($other != '')
            <div class="card">
                <div class="card-header">
                    <h4>Info Lainnya</h4>
                </div>
                <div class="card-body">
                    <div class="py-4">
                        <p class="clearfix">
                            <span class="float-left">
                                Provinsi
                            </span>
                            <span class="float-right text-muted">
                                {{$other->province}}
                            </span>
                        </p>
                        <p class="clearfix">
                            <span class="float-left">
                                Kota
                            </span>
                            <span class="float-right text-muted">
                                {{$other->city}}
                            </span>
                        </p>
                        <p class="clearfix">
                            <span class="float-left">
                                Alamat Lengkap
                            </span>
                            <span class="float-right text-muted">
                                {{$other->address_detail}}
                            </span>
                        </p>
                        <p class="clearfix">
                            <span class="float-left">
                                About
                            </span>
                            <span class="float-right text-muted">
                                {{$other->detail_pengguna}}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div class="col-12 col-md-12 col-lg-8">
            <div class="card">
                <div class="padding-20">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab" aria-selected="true">10 Riwayat Penggunaan </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#update" role="tab" aria-selected="false">Update Data</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#postingan" role="tab" aria-selected="false">Postingan</a>
                        </li> -->
                    </ul>
                    <div class="tab-content tab-bordered" id="myTab3Content">
                        <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                            <div class="row">
                                <div class="col-md-12 col-12 b-r">
                                    <div class="activities">
                                        @foreach($activity as $expe)
                                        <div class="activity">
                                            <div class="activity-icon bg-success text-white">
                                                <i class="fa fa-plane"></i>
                                            </div>
                                            <div class="activity-detail">
                                                <div class="mb-2">
                                                    <span class="text-job" style="color: black;"> {{$expe->created_at}} </span>
                                                    <span class="bullet"></span>
                                                </div>
                                                <p>{{$expe->description}}</p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="update" role="tabpanel" aria-labelledby="profile-tab2">
                            <div class="row">

                                <div class="col-12">
                                    <form method="POST" action="{{route('user.ppdb.update')}}">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="form-group col-4">
                                                <label for="first_name">Nama Awal</label>
                                                <input type="hidden" name="id" value="{{$data->id}}">
                                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{$data->first_name}}" required autofocus>
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="middle_name">Nama Tengah</label>
                                                <input id="middle_name" type="text"  class="form-control" name="middle_name" value="{{$data->middle_name}}">
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="last_name">Nama Akhir</label>
                                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{$data->last_name}}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="email">Email</label>
                                                <input id="email" type="email" class="form-control" required name="email" value="{{$data->email}}">
                                                <div class="invalid-feedback">
                                                </div>
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="phone">No Phonsel</label>
                                                <input id="phone" type="number"  class="form-control" required name="phone" value="{{$data->phone}}">
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
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                                Update Data
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@section('script')
<script src="{{my_asset('plugins/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>
<script src="{{my_asset('admin/theme/js/page/gallery1.js')}}"></script>
<script src="{{my_asset('plugins/summernote/summernote-bs4.js')}}"></script>

<script src="{{my_asset('plugins/dropify/js/dropify.min.js')}}"></script>
<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();
    });
</script>
@endsection
@endsection