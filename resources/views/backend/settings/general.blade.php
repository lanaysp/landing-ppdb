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
                            <p class="card-description"> Pengaturan General Meliputi Pengaturan Umum yang bakal ditampilkan atau digunakan user </p>
                            <form class="forms-sample" action="{{route('settings.post',['general_system'])}}" enctype="multipart/form-data" method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="control-label">Aktifkan Website</div>
                                            <div class="custom-switches-stacked mt-2">
                                                <label class="custom-switch">
                                                    <input type="radio" name="website_on" value="1" class="custom-switch-input" @if($data->website_on == 1) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Iya</span>
                                                </label>
                                                <label class="custom-switch">
                                                    <input type="radio" name="website_on" value="0" class="custom-switch-input" @if($data->website_on == 0) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Tidak</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="control-label">Aktifkan PPDB</div>
                                            <div class="custom-switches-stacked mt-2">
                                                <label class="custom-switch">
                                                    <input type="radio" name="ppdb_on" value="1" class="custom-switch-input" @if($data->ppdb_on == 1) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Iya</span>
                                                </label>
                                                <label class="custom-switch">
                                                    <input type="radio" name="ppdb_on" value="0" class="custom-switch-input" @if($data->ppdb_on == 0) checked @endif>
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
                                            <div class="control-label">Must Verify Email</div>
                                            <div class="custom-switches-stacked mt-2">
                                                <label class="custom-switch">
                                                    <input type="radio" name="must_verify" value="1" class="custom-switch-input" @if($data->must_verify == 1) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Iya</span>
                                                </label>
                                                <label class="custom-switch">
                                                    <input type="radio" name="must_verify" value="0" class="custom-switch-input" @if($data->must_verify == 0) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Tidak</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="control-label">Layout Light</div>
                                            <div class="custom-switches-stacked mt-2 selectgroup layout-color w-50">
                                                <label class="custom-switch">
                                                    <input type="radio" name="layout_dark" value="1" class="custom-switch-input" @if($data->layout_dark == 1) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Iya</span>
                                                </label>
                                                <label class="custom-switch">
                                                    <input type="radio" name="layout_dark" value="2" class="custom-switch-input" @if($data->layout_dark == 2) checked @endif>
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
                                            <div class="control-label">Sidebar Light</div>
                                            <div class="custom-switches-stacked mt-2 sidebar-color">
                                                <label class="custom-switch">
                                                    <input type="radio" name="sidebar_custom" value="1" class="custom-switch-input" @if($data->sidebar_custom == 1) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Iya</span>
                                                </label>
                                                <label class="custom-switch">
                                                    <input type="radio" name="sidebar_custom" value="2" class="custom-switch-input" @if($data->sidebar_custom == 2) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Tidak</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="control-label">Menu Custom </div>
                                            <div class="custom-switches-stacked mt-2 selectgroup layout-color w-50">
                                                <div class="theme-setting-options">
                                                    <label class="m-b-0">
                                                        <input type="checkbox" name="menu_custom" <?= $data->menu_custom == 'on' ? 'checked' : null; ?> class="custom-switch-input" id="mini_sidebar_setting">
                                                        <span class="custom-switch-indicator"></span>
                                                        <span class="control-label p-l-10">Mini Sidebar</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group ">
                                            <label for="color">Custom Color Theme</label>
                                            <select class="form-control " name="color_custom">
                                                @foreach($color as $wrna => $details)
                                                <option value="{{$details}}" <?= $details == $data->color_custom ? 'selected' : null; ?> class="{{$details}}">{{$wrna}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="school_name">Nama Sekolah</label>
                                            <input type="text" class="form-control" id="school_name" value="{{$data->school_name}}" name="school_name" placeholder="Masukkan Nama Sekolah">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="metatitle">Logo Admin</label>
                                            <input class="dropify" type="file" name="admin_logo" data-default-file="{{my_asset($data->admin_logo)}}">
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