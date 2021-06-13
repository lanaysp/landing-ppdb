@extends('backend.inc.app')
@section('content')
@section('style')
<link rel="stylesheet" href="{{my_asset('plugins/dropify/css/dropify.min.css')}}">
@endsection
<div class="row">
    <div class="col-12">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>{{$page}}</h4>
                            <form class="forms-sample" action="{{route('settings.post',['mailing'])}}" enctype="multipart/form-data" method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="control-label">Email Notifikasi Pengguna Ketika Admin Mendaftarkan Peserta yang bersangkutan</div>
                                            <div class="custom-switches-stacked mt-2">
                                                <label class="custom-switch">
                                                    <input type="radio" name="ppdb_admin" value="1" class="custom-switch-input" @if($data->ppdb_admin == 1) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Iya</span>
                                                </label>
                                                <label class="custom-switch">
                                                    <input type="radio" name="ppdb_admin" value="0" class="custom-switch-input" @if($data->ppdb_admin == 0) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Tidak</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="control-label">Email Notifikasi Kedua belah pihak ( Pendaftar & Admin), ketika pengguna mendaftar online </div>
                                            <div class="custom-switches-stacked mt-2">
                                                <label class="custom-switch">
                                                    <input type="radio" name="ppdb_user" value="1" class="custom-switch-input" @if($data->ppdb_user == 1) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Iya</span>
                                                </label>
                                                <label class="custom-switch">
                                                    <input type="radio" name="ppdb_user" value="0" class="custom-switch-input" @if($data->ppdb_user == 0) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Tidak</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="control-label">Email Notifikasi Otomatis Kepada Pihak Peserta Ketika Lulus </div>
                                            <div class="custom-switches-stacked mt-2">
                                                <label class="custom-switch">
                                                    <input type="radio" name="penerimaan" value="1" class="custom-switch-input" @if($data->penerimaan == 1) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Iya</span>
                                                </label>
                                                <label class="custom-switch">
                                                    <input type="radio" name="penerimaan" value="0" class="custom-switch-input" @if($data->penerimaan == 0) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Tidak</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="control-label">Email Notifikasi Kepada Pihak Peserta Terkait Ketidak Lulusan</div>
                                            <div class="custom-switches-stacked mt-2 selectgroup layout-color w-50">
                                                <label class="custom-switch">
                                                    <input type="radio" name="penolakan" value="1" class="custom-switch-input" @if($data->penolakan == 1) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Iya</span>
                                                </label>
                                                <label class="custom-switch">
                                                    <input type="radio" name="penolakan" value="2" class="custom-switch-input" @if($data->penolakan == 2) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Tidak</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="control-label">Email Notifikasi Otomatis Ketika Seseorang Mengomentari pembuat forum</div>
                                            <div class="custom-switches-stacked mt-2 ">
                                                <label class="custom-switch">
                                                    <input type="radio" name="balasan_forum" value="1" class="custom-switch-input" @if($data->balasan_forum == 1) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Iya</span>
                                                </label>
                                                <label class="custom-switch">
                                                    <input type="radio" name="balasan_forum" value="2" class="custom-switch-input" @if($data->balasan_forum == 2) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Tidak</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">

                                        <div class="form-group">
                                            <div class="control-label">Email Notifikasi Admin, Ketika Subcribe terjadi </div>
                                            <div class="custom-switches-stacked mt-2 ">
                                                <label class="custom-switch">
                                                    <input type="radio" name="subcribe" value="1" class="custom-switch-input" @if($data->subcribe == 1) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Iya</span>
                                                </label>
                                                <label class="custom-switch">
                                                    <input type="radio" name="subcribe" value="2" class="custom-switch-input" @if($data->subcribe == 2) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Tidak</span>
                                                </label>
                                            </div>
                                        </div>

                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="control-label">Email Pemberitahuan Ketika Seseorang Memberikan komentar di blog / artikel berita</div>
                                            <div class="custom-switches-stacked mt-2 ">
                                                <label class="custom-switch">
                                                    <input type="radio" name="komentar" value="1" class="custom-switch-input" @if($data->komentar == 1) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Iya</span>
                                                </label>
                                                <label class="custom-switch">
                                                    <input type="radio" name="komentar" value="2" class="custom-switch-input" @if($data->komentar == 2) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Tidak</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">

                                        <div class="form-group">
                                            <div class="control-label">Email Notifikasi Ketika Ada yang mengirim kontak pesan </div>
                                            <div class="custom-switches-stacked mt-2 ">
                                                <label class="custom-switch">
                                                    <input type="radio" name="contact" value="1" class="custom-switch-input" @if($data->contact == 1) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Iya</span>
                                                </label>
                                                <label class="custom-switch">
                                                    <input type="radio" name="contact" value="2" class="custom-switch-input" @if($data->contact == 2) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Tidak</span>
                                                </label>
                                            </div>
                                        </div>


                                    </div>


                                </div>
                                <div class="row">

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="school_name">Email Admin</label>
                                            <input type="text" class="form-control" id="school_name" value="{{$data->email}}" name="email" placeholder="Masukkan Alamat Email Notifikasi">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="metatitle">Logo Template Email</label>
                                            <input class="dropify" type="file" name="logo" data-default-file="{{my_asset($data->logo)}}">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="metatitle">Banner Template Email</label>
                                            <input class="dropify" type="file" name="banner" data-default-file="{{my_asset($data->banner)}}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success mr-2">Simpan Pengaturan</button>
                            </form>
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