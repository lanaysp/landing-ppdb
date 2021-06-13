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
                <form action="{{route('cms.insert',['insertNews'])}}" method="post" enctype="multipart/form-data" class="card-body">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label class="label-control">Judul Berita</label>
                                <input type="text" name="news_title" value="{{old('news_title')}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label class="label-control">Tanggal Buat</label>
                                <input type="date" name="news_date" value="{{old('news_date')}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label class="label-control">Kategori</label>
                                <select class="form-control selectric" name="cat_news_id">
                                    <option value="">Pilih Kategori</option>
                                    @foreach($cate as $cat)
                                    <option value="{{$cat->id}}" <?= $cat->id == old('cat_news_id') ? 'selected' : null; ?>>{{$cat->cat_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Author </label>
                                <input type="text" readonly value="{{Auth()->user()->Employee->username}}" class="form-control">
                                <input type="hidden" name="news_author" value="{{Auth()->user()->Employee->id}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">Masukkan Tags Berita</label>
                                <input type="text" name="tag_id" value="{{old('tag_id')}}" class="form-control inputtags">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">Isi Berita</label>
                                <textarea name="news_description" class="summernote">{{old('news_description')}}</textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">Thumbnail</label>
                                <div id="image-preview" class="image-preview">
                                    <label for="image-upload" id="image-label">Pilih Gambar</label>
                                    <input type="file" name="thumbnail" id="image-upload" />
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">Status</label>
                                <select class="form-control selectric" name="news_status">
                                    <option value="1">Publish</option>
                                    <option value="0">Pending</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-primary">Tambah Berita</button>
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