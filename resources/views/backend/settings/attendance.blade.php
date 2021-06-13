@extends('backend.inc.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>{{$page}}</h4>
                            <br>
                            <form class="forms-sample">

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="caraabsen">Cara Absensi</label>
                                            <select class="form-control" id="caraabsen" name="caraabsen">
                                                <option value="01">Maps Tracking</option>
                                                <option value="02">Selfie Dikelas</option>
                                                <option value="03">Qrcode</option>
                                                <option value="04">Finger Print</option>
                                                <option value="05">Manual ( Oleh Guru )</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="harilibur">Tetapkan Hari Libur</label>
                                            <select class="form-control" id="harilibur" name="harilibur">
                                                <option value="01">Minggu Saja</option>
                                                <option value="02">Minggu & Sabtu</option>
                                                <option value="03">Jumat & Minggu</option>
                                                <option value="04">Jumat Saja</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="pulang">Tetapkan Jam Pulang</label>
                                            <input type="time" id="pulang" class="form-control" id="pulang">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="masuk">Tetapkan Jam Masuk</label>
                                            <input type="time" class="form-control" id="masuk" placeholder="Tetapkan Jam Masuk">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="instagram">Api Maps ( Jika Penggunaan Maps Tracking Absensi )</label>
                                            <input type="url" class="form-control" id="instagram" placeholder="Masukkan URL Instagram">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="instagram">Uploads Qrcode ( Jika Penggunaan Qrcode Absensi )</label>
                                            <input type="url" class="form-control" id="instagram" placeholder="Masukkan URL Instagram">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="ip">IP Address ( Jika Finger Absen )</label>
                                            <input type="text" id="ip" class="form-control" id="pulang">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="code">Code Finger ( Jika Finger Absen )</label>
                                            <input type="text" class="form-control" id="code" >
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success mr-2">Simpan Pengaturan</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection