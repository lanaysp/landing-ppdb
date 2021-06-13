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
                <form action="{{route('document.create','create')}}" method="post" enctype="multipart/form-data" class="card-body">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label class="label-control">Nama Document / Judul Surat</label>
                                <input type="text" name="title" value="{{old('title')}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label class="label-control">Pilih Tanda Tangan</label>
                                <select class="form-control selectric" name="tanda_tangan_id">
                                    <option value="">Pilih Tanda Tangan surat</option>
                                    @foreach($data['tanda'] as $tanda)
                                    <option value="{{$tanda->id}}" <?= $tanda->id == old('tanda_tangan_id') ? 'selected' : null; ?>>{{$tanda->employee->first_name}} {{$tanda->employee->middle_name}} {{$tanda->employee->last_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <div class="form-group">
                                <label class="label-control">Pilih Kategori</label>
                                <select class="form-control selectric" name="document_category_id">
                                    <option value="">Pilih Kategori</option>
                                    @foreach($data['category'] as $cat)
                                    <option value="{{$cat->id}}" <?= $cat->id == old('document_category_id') ? 'selected' : null; ?>>{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-12">
                            <div class="form-group">
                                <label class="label-control">Gunakan Qr Code ?</label>
                                <select class="form-control selectric" name="qr_code">
                                    <option value="1">Ya</option>
                                    <option value="1">Tidak</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-12">
                            <div class="form-group">
                                <label class="label-control">Pilih Template</label>
                                <select class="form-control selectric" name="template_document_id">
                                    <option value="">Pilih Kategori</option>
                                    @foreach($data['template'] as $template)
                                    <option value="{{$template->id}}" <?= $template->id == old('template_document_id') ? 'selected' : null; ?>>{{$template->template_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                       
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">Isi Berita</label>
                                <textarea name="description" class="summernote">{{old('description')}}</textarea>
                            </div>
                        </div>
                       
                   
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-primary">Simpan Document</button>
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