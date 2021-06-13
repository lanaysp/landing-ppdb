<div class="modal fade add-gelombang" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('insert.ppdb.gelombang')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Tahun Ajaran</label>
                            <select class="form-control" name="tahun_ajaran_id">
                                @foreach($tahun as $priode)
                                <option value="{{$priode->id}}" <?= $priode->id == old('tahun_ajaran_id') ? 'selected' : null; ?>>{{$priode->tahun_ajaran}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Nama Gelombang</label>
                            <input type="text" class="form-control" placeholder="Nama Gelombang / Sesi Pendaftaran" name="nama_gelombang" value="{{old('nama_gelombang')}}">
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label">Dari Tanggal </label>
                            <input type="date" class="form-control" placeholder="Batas Akhir Pendaftaran" required name="mulai_tanggal" value="{{old('mulai_tanggal')}}">
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label">Batas Akhir Pendaftaran </label>
                            <input type="date" class="form-control" placeholder="Batas Akhir Pendaftaran" required name="tanggal_akhir" value="{{old('tanggal_akhir')}}">
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
<div class="modal fade update-gelombang-{{$update->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Update Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('update.ppdb.gelombang')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Tahun Ajaran</label>
                            <input type="hidden" name="id" value="{{$update->id}}">
                            <select class="form-control" name="tahun_ajaran_id">
                                @foreach($tahun as $priode)
                                <option value="{{$priode->id}}" <?= $priode->id == $update->tahun_ajaran_id ? 'selected' : null; ?>>{{$priode->tahun_ajaran}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Nama Gelombang</label>
                            <input type="text" class="form-control" placeholder="Nama Gelombang / Sesi Pendaftaran" name="nama_gelombang" value="{{$update->nama_gelombang}}">
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label">Dari Tanggal </label>
                            <input type="date" class="form-control" placeholder="Mulai Pendaftaran" required name="mulai_tanggal" value="{{$update->mulai_tanggal}}">
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label">Batas Akhir Pendaftaran </label>
                            <input type="date" class="form-control" placeholder="Batas Akhir Pendaftaran" required name="tanggal_akhir" value="{{$update->tanggal_akhir}}">
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
<div class="modal fade info" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <p>
                        Anda Dapat Menambahkan Data atau Meng-update data yang telah di tambahkan. Namun Tidak dengan menghapusnya. Seluruh data ppdb - gelombang, hingga pemilihan siswa yang terpilih menjadi peserta didik ajaran baru akan saling
                        terintegrasi ( Terhubung ) dengan nama angkatannya
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>