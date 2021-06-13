<div class="modal fade add-mapel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Tambah Data Mapel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('insert.mapel')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label"> Kode Mapel</label>
                            <input type="text" class="form-control" placeholder="Kode Mapel" name="mapel_code" value="{{old('mapel_code')}}">
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label"> Nama Mapel</label>
                            <input type="text" class="form-control" placeholder="Nama Mapel " name="mapel_name" value="{{old('mapel_name')}}">
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label"> Unggulan</label>
                            <select name="featured" class="form-control">
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label"> Status Mapel</label>
                            <select name="status" class="form-control">
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <label class="control-label">Pilih Guru</label>
                            <select class="form-control" name="teacher_id">
                                @foreach($teac as $teacher)
                                <option value="{{$teacher->id}}">{{$teacher->employee->username}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Gambar Mapel </label>
                            <input class="dropify" type="file" name="mapel_image" data-default-file="{{my_asset(old('mapel_image'))}}">
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
<div class="modal fade edit-mapel-{{$update->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Update Data Mapel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('update.mapel')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label"> Kode Mapel</label>
                            <input type="hidden" name="id" value="{{$update->id}}">
                            <input type="text" class="form-control" placeholder="Kode Mapel" name="mapel_code" value="{{$update->mapel_code}}">
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label"> Nama Mapel</label>
                            <input type="text" class="form-control" placeholder="Nama Mapel " name="mapel_name" value="{{$update->mapel_name}}">
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label"> Unggulan</label>
                            <select name="featured" class="form-control">
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label"> Status Mapel</label>
                            <select name="status" class="form-control">
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <label class="control-label">Pilih Guru</label>
                            <select class="form-control" name="teacher_id">
                                @foreach($teac as $guru)
                                <option value="{{$guru->id}}" <?= $guru->id == $update->teacher_id ? 'selected' : null; ?>>{{$guru->employee->username}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Gambar Mapel </label>
                            <input class="dropify" type="file" name="mapel_image" data-default-file="{{my_asset($update->mapel_image)}}">
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