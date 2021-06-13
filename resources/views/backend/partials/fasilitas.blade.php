<div class="modal fade add-fasilitas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Tambah Data Fasilitas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('fasilitas.insert')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Nama Fasilitas</label>
                            <input type="text" class="form-control" placeholder="Nama Fasilitas " name="facility_name" value="{{old('facility_name')}}">
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <label class="control-label">Deskripsi Singkat</label>
                            <textarea class="form-control" name="deskripsi">{{old('deskripsi')}}</textarea>
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Gambar Fasilitas </label>
                            <input class="dropify" type="file" name="facility_image" data-default-file="{{my_asset(old('facility_image'))}}">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 40px;">
                        <div class="col-lg-12 col-sm-12">
                            <button type="reset" class="btn btn-warning"> Reset</button>
                            <button type="submit" class="btn btn-primary"> Tambah Data</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@foreach($data as $update)
<div class="modal fade edit-fasilitas-{{$update->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Update Data Fasilitas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('fasilitas.update')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Nama Fasilitas</label>
                            <input type="hidden" name="id" value="{{$update->id}}">
                            <input type="text" class="form-control" name="facility_name" value="{{$update->facility_name}}">
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <label class="control-label">Deskripsi Singkat</label>
                            <textarea class="form-control" name="deskripsi">{{$update->deskripsi}}</textarea>
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Gambar Fasilitas </label>
                            <input class="dropify" type="file" name="facility_image" data-default-file="{{my_asset($update->facility_image)}}">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 40px;">
                        <div class="col-lg-12 col-sm-12">
                            <button type="reset" class="btn btn-warning"> Reset</button>
                            <button type="submit" class="btn btn-primary"> Simpan Perubahan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach