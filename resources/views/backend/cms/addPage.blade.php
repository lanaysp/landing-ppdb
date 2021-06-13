@extends('backend.inc.app')
@section('content')
@section('style')
<link rel="stylesheet" href="{{my_asset('plugins/summernote/summernote-bs4.css')}}">
<link rel="stylesheet" href="{{my_asset('plugins/jquery-selectric/selectric.css')}}">
<link rel="stylesheet" href="{{my_asset('plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}">
@endsection
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{route('cms.insert',['insert-page'])}}" method="post" enctype="multipart/form-data" class="card-body">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label class="label-control">Judul Halaman</label>
                                <input type="text" name="page_name" value="{{old('page_name')}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label class="label-control">Posisi Menu</label>
                                <select class="form-control selectric" name="position">
                                    <option value="">Pilih Posisi</option>
                                    <option value="1">Menu Atas</option>
                                    <option value="2">Info Sekolah (Footer)</option>
                                    <option value="3">Info Umum (Footer)</option>
                                    <option value="4">Lainnya (Footer)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">Content Halaman</label>
                                <textarea name="content" class="summernote">{{old('content')}}</textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">Image</label>
                                <div id="image-preview" class="image-preview">
                                    <label for="image-upload" id="image-label">Pilih Gambar</label>
                                    <input type="file" name="image" id="image-upload" />
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">Status</label>
                                <select class="form-control selectric" name="page_status">
                                    <option value="1">Publish</option>
                                    <option value="0">Pending</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-primary">Tambah Halaman</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
@section('script')
<script src="{{my_asset('plugins/summernote/summernote-bs4.js')}}"></script>
<script src="{{my_asset('plugins/jquery-selectric/jquery.selectric.min.js')}}"></script>
<script src="{{my_asset('plugins/upload-preview/assets/js/jquery.uploadPreview.min.js')}}"></script>
<script src="{{my_asset('plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{my_asset('admin/theme/js/page/create-post.js')}}"></script>
@endsection
@endsection