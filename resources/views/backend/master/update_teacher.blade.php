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
                <form action="{{route('teacher.edit')}}" method="post" enctype="multipart/form-data" class="card-body">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label class="label-control">Pilih Data Pegawai</label>
                                <input type="hidden" name="id" value="{{$data->id}}">
                                <select class="form-control selectric" name="employee_id">
                                    @foreach($empl as $pegawai)
                                    <option value="{{$pegawai->id}}" <?= $pegawai->id == $data->employee_id ? 'selected' : null; ?>>{{$pegawai->username}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label class="label-control">Status Pengajar</label>
                                <select class="form-control selectric" name="teacher_mode">
                                    @if($data->teacher_mode == 1)
                                    <option value="1">Honorer</option>
                                    <option value="2">PNS</option>
                                    @else
                                    <option value="2">PNS</option>
                                    <option value="1">Honorer</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label class="label-control">Email Guru</label>
                                <input type="email" name="email" class="form-control" value="{{$data->email}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Password </label>
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">Pengalaman Guru</label>
                                <textarea name="teacher_experience" class="summernote-simple">{{$data->teacher_experience}}</textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">Tentang Guru</label>
                                <textarea name="teacher_about" class="summernote-simple">{{$data->teacher_about}}</textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">Spekualifikasi Guru</label>
                                <textarea name="qualification" class="summernote-simple">{{$data->qualification}}</textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">Photo Guru</label>
                                <div id="image-preview" class="image-preview">
                                    <label for="image-upload" id="image-label">Pilih Gambar</label>
                                    <input type="file" name="teacher_image" id="image-upload" />
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">Resume Guru</label>
                                <input type="file" name="document_resume" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-primary">Update Guru</button>
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