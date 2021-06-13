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
                            <p class="card-description"> Pengaturan General Meliputi Pengaturan yang berkaitan dengan cara kerja system yang akan digunakan </p>
                            <br>
                            <form class="forms-sample">

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="kantin">Penggunaan System Kantin ( Berbayar / Gratis ) </label>
                                            <br>
                                            <input id="kantin" type="checkbox" name="kantin" class="switch" checked>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="notifagama">Notifikasi Keagamaan</label>
                                            <br>
                                            <input id="notifagama" type="checkbox" name="notifagama" class="switch" checked>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="semangat">Penyemngat Pagi Bagi Siswa</label>
                                            <br>
                                            <input id="semangat" type="checkbox" name="semangat" class="switch" checked>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="audio">Audio Khusus Budaya</label>
                                            <br>
                                            <input id="audio" type="checkbox" name="audio" class="switch" checked>
                                        </div>
                                    </div>
                                </div>
                                
                                

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="cetaksp">Izinkan Wali Kelas Mencetak Surat SP Sendiri</label>
                                            <br>
                                            <input id="cetaksp" type="checkbox" name="notifagama" class="switch" checked>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="chatting">Aktifkan Fiture Chat Antar Pengguna</label>
                                            <br>
                                            <input id="chatting" type="checkbox" name="chatting" class="switch" checked>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="nilaibaik">Umumkan Nilai Tertinggi ( Setiap Semester )</label>
                                            <br>
                                            <input id="nilaibaik" type="checkbox" name="nilaibaik" class="switch" checked>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="asrama">Aktifkan Fiture Asrama</label>
                                            <br>
                                            <input id="s2" type="checkbox" class="switch" checked>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="filter">Pembatasan Kata Dipostingan </label>
                                            <textarea class="form-control" name="filter" id="filter"></textarea>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="potongan">Potongan Tabungan ( % Persentase )</label>
                                            <input type="number" class="form-control" id="potongan" placeholder="Sample ( 5% )">
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