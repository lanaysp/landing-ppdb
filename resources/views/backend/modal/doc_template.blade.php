<div class="modal fade add-template" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Tambah Template Document</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('document.tambah.template','create')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Nama Template </label>
                            <input type="text" name="template_name" class="form-control" placeholder="Nama Template" value="{{old('template_name')}}">
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Nama sekolah </label>
                            <input type="text" name="school_name" class="form-control" placeholder="Nama Sekolah" value="{{old('school_name')}}">
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Alamat Sekolah </label>
                            <input type="text" name="school_address" class="form-control" placeholder="Alamat Sekolah" value="{{old('school_address')}}">
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Footer Text </label>
                            <textarea class="form-control" name="footer_text">{{old('footer_text')}}</textarea>
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label">Logo sekolah </label>
                            <input class="dropify" type="file" name="school_logo" data-default-file="{{my_asset(old('school_logo'))}}">
                        </div>

                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label">Template Background </label>
                            <input class="dropify" type="file" name="background" data-default-file="{{my_asset(old('background'))}}">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 40px;">
                        <div class="col-lg-12 col-sm-12">
                            <button type="reset" class="btn btn-warning"> Reset</button>
                            <button type="submit" class="btn btn-primary"> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach($data as $update)
<div class="modal fade update-template{{$update->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Edit Template</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('document.tambah.template','update')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">

                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Nama Template </label>
                            <input type="text" name="template_name" class="form-control" placeholder="Nama Template" value="{{$update->template_name}}">
                        </div>

                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Nama sekolah </label>
                            <input type="hidden" name="id" value="{{$update->id}}">
                            <input type="text" name="school_name" class="form-control" placeholder="Nama Sekolah" value="{{$update->school_name}}">
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Alamat Sekolah </label>
                            <input type="text" name="school_address" class="form-control" placeholder="Alamat Sekolah" value="{{$update->school_address}}">
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Footer Text </label>
                            <textarea class="form-control" name="footer_text">{{$update->footer_text}}</textarea>
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label">Logo sekolah </label>
                            <input class="dropify" type="file" name="school_logo" data-default-file="{{my_asset($update->school_logo)}}">
                        </div>

                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label">Template Background </label>
                            <input class="dropify" type="file" name="background" data-default-file="{{my_asset($update->background)}}">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 40px;">
                        <div class="col-lg-12 col-sm-12">
                            <button type="reset" class="btn btn-warning"> Reset</button>
                            <button type="submit" class="btn btn-primary"> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach