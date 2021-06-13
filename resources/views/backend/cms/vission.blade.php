@extends('backend.inc.app')
@section('content')
@section('style')
<link rel="stylesheet" href="{{my_asset('plugins/summernote/summernote-bs4.css')}}">
<link rel="stylesheet" href="{{my_asset('plugins/dropify/css/dropify.min.css')}}">
@endsection
<div class="row">
    <div class="col-12">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>Visi Sekolah</h4>
                            <br>
                            <form enctype="multipart/form-data" method="post" action="{{route('cms.insert',['vission'])}}" class="forms-sample">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="image_vission">Vission Image</label>
                                            <input class="dropify" type="file" id="image_vission" name="image_vission" data-default-file="{{my_asset($data->image_vission)}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="vission">Visi Sekolah</label>
                                            <textarea class="summernote" id="vission" name="vission">{{$data->vission}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success mr-2">Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>Misi Sekolah</h4>
                            <br>
                            <form enctype="multipart/form-data" method="post" action="{{route('cms.insert',['mission'])}}" class="forms-sample">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="image_mission">Mission Image</label>
                                            <input class="dropify" type="file" id="image_mission" name="image_mission" data-default-file="{{my_asset($data->image_mission)}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="mission">Misi Sekolah</label>
                                            <textarea class="summernote" id="mission" name="mission">{{$data->mission}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success mr-2">Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>Slogan Sekolah</h4>
                            <br>
                            <form enctype="multipart/form-data" method="post" action="{{route('cms.insert',['slogan'])}}" class="forms-sample">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="image_slogan">Vission Image</label>
                                            <input class="dropify" type="file" id="image_slogan" name="image_slogan" data-default-file="{{my_asset($data->image_slogan)}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="slogan">Visi Sekolah</label>
                                            <textarea class="summernote" id="slogan" name="slogan">{{$data->slogan}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success mr-2">Simpan Perubahan</button>
                            </form>
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