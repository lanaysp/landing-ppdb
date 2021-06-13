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
                            <h4>{{$page}}</h4>
                            <br>
                            <form enctype="multipart/form-data" method="post" action="{{route('cms.insert',['about'])}}" class="forms-sample">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="image_about">Tentang Image</label>
                                            <input class="dropify" type="file" id="image_about" name="image_about" data-default-file="{{my_asset($data->image_about)}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="link_video">Link Video</label>
                                            <input class="form-control" type="url" id="link_video" name="link_video" value="{{$data->link_video}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="about">Visi Sekolah</label>
                                            <textarea class="summernote" id="about" name="about">{{$data->about}}</textarea>
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