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
                            <p class="card-description"> Pengaturan Absensi Meliputi Pengaturan yang berkaitan dengan cara penggunaan dan kinerja absensi yang dibutuhkan intansi  </p>
                            <form class="forms-sample">

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="emailsekolah">Cara Absensi</label>
                                            <input type="email" class="form-control" id="emailsekolah" placeholder="Masukkan Email">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="ponsel">Tetapkan Jam Masuk</label>
                                            <input type="number" class="form-control" id="ponsel" placeholder="Masukkan No Ponsel ">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="facebook">Tetapkan Jam Pulang</label>
                                            <input type="url" class="form-control" id="facebook" placeholder="Masukkan URL Facebook Sekolah">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="twitter">Tetapkan Hari Libur</label>
                                            <input type="url" class="form-control" id="twitter" placeholder="Masukkan URL Twitter Sekolah">
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