@extends('backend.inc.app')
@section('content')
@section('style')
<link rel="stylesheet" href="{{my_asset('plugins/summernote/summernote-bs4.css')}}">
@endsection
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{route('mailing.store')}}" method="post" enctype="multipart/form-data" class="card-body">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label class="label-control">Mail Subject</label>
                                <input type="text" name="title" value="{{old('title')}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label class="label-control">Pilih Pengambilan Email</label>
                                <select class="form-control selectric" name="mail_from">
                                    <option value="">Pilih</option>
                                    <option value="subcribe">Subcriber</option>
                                    <option value="contact">Kontak</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label class="label-control">Pilih Email</label>
                                <select class="form-control selectric" name="email">
                                    <option value="">Pilih Kategori</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">Isi Pesan Email</label>
                                <textarea name="description" class="form-control">{{old('description')}}</textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">Tambahkan File</label>
                                <input type="file" name="file" class="form-control" />
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">Tambahkan Banner Email</label>
                                <input type="file" name="image" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-primary" type="submit">Kirim Pesan</button>
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

<script>
        window.onload = function() {
            $("select[name='mail_from']").change(function() {
                var url = "/administrator/mailing/getmail/" + $(this).val();
                $("select[name='email']").load(url);
                return false;
            });
        };
    </script>
@endsection
@endsection