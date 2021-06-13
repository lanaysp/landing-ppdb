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
                            <br>
                            <form class="forms-sample" action="{{route('settings.post',['ppdb'])}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="metatitle">Form Registration Offline ( PDF & Docx Required ) </label>
                                            <input class="dropify" type="file" name="file_pendaftaran" data-default-file="{{my_asset($data->file_pendaftaran)}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="metatitle">Logo Sekolah ( Untuk disimpan di hasil print Pendaftaran) </label>
                                            <input class="dropify" type="file" name="logo_ppdb" data-default-file="{{my_asset($data->logo_ppdb)}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="metatitle">Background Kartu Peserta </label>
                                            <input class="dropify" type="file" name="background_image" data-default-file="{{my_asset($data->background_image)}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="control-label">Aktifkan Mading</div>
                                            <div class="custom-switches-stacked mt-2">
                                                <label class="custom-switch">
                                                    <input type="radio" name="mading" value="on" class="custom-switch-input" @if($data->mading == 'on') checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Iya</span>
                                                </label>
                                                <label class="custom-switch">
                                                    <input type="radio" name="mading" value="off" class="custom-switch-input" @if($data->mading == 'off') checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Tidak</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="control-label">Aktifkan Forum</div>
                                            <div class="custom-switches-stacked mt-2">
                                                <label class="custom-switch">
                                                    <input type="radio" name="forum" value="on" class="custom-switch-input" @if($data->forum == 'on') checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Iya</span>
                                                </label>
                                                <label class="custom-switch">
                                                    <input type="radio" name="forum" value="off" class="custom-switch-input" @if($data->forum == 'off') checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Tidak</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="control-label">Aktifkan Offline Registration</div>
                                            <div class="custom-switches-stacked mt-2">
                                                <label class="custom-switch">
                                                    <input type="radio" name="offline" value="on" class="custom-switch-input" @if($data->offline == 'on') checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Iya</span>
                                                </label>
                                                <label class="custom-switch">
                                                    <input type="radio" name="offline" value="off" class="custom-switch-input" @if($data->offline == 'off') checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Tidak</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="control-label">Aktifkan Customer Service</div>
                                            <div class="custom-switches-stacked mt-2">
                                                <label class="custom-switch">
                                                    <input type="radio" name="cs" value="on" class="custom-switch-input" @if($data->cs == 'on') checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Iya</span>
                                                </label>
                                                <label class="custom-switch">
                                                    <input type="radio" name="cs" value="off" class="custom-switch-input" @if($data->cs == 'off') checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Tidak</span>
                                                </label>
                                            </div>
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