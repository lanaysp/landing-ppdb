<div class="modal fade add-tahun" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('insert.ppdb.tahun')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Tahun Ajaran</label>
                            <input type="text" class="form-control" placeholder="Tahun Ajaran" name="tahun_ajaran" value="{{old('tahun_ajaran')}}">
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Nama Tahun Ajaran (Opsional)</label>
                            <input type="text" class="form-control" placeholder="Nama Tahun Ajaran" name="nama_tahunajaran" value="{{old('nama_tahunajaran')}}">
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Nama Angkatan ( Opsional ) </label>
                            <input type="text" class="form-control" placeholder="Nama Angkatan" name="nama_angkatan" value="{{old('nama_angkatan')}}">
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
<div class="modal fade update-tahun-{{$update->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Update Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('update.ppdb.tahun')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Tahun Ajaran</label>
                            <input type="hidden" name="id" value="{{$update->id}}">
                            <input type="text" class="form-control" placeholder="Tahun Ajaran" name="tahun_ajaran" value="{{$update->tahun_ajaran}}">
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Nama Tahun Ajaran (Opsional)</label>
                            <input type="text" class="form-control" placeholder="Nama Tahun Ajaran" name="nama_tahunajaran" value="{{$update->nama_tahunajaran}}">
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Nama Angkatan ( Opsional ) </label>
                            <input type="text" class="form-control" placeholder="Nama Angkatan" name="nama_angkatan" value="{{$update->nama_angkatan}}">
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