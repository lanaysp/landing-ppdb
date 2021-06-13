<?php

use App\Admin\SettGeneral;
use App\SettPpdb;

$pengaturan     = SettGeneral::first();
$ppdb           = SettPpdb::first();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Formulir Registrasi Peserta PPDB</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{my_asset('admin/theme/css/app.min.css')}}">

    <link rel="stylesheet" href="{{my_asset('admin/theme/css/style.css')}}">
    <link rel="stylesheet" href="{{my_asset('admin/theme/css/components.css')}}">
    <style type="text/css" media="print">
        * {
            -webkit-print-color-adjust: exact !important;
            /*Chrome, Safari */
            color-adjust: exact !important;
            /*Firefox*/
        }
    </style>
</head>

<body onload="window.print()">

    <div>
        <div class="main-wrapper ">

            <div style="margin: 30px;">
                <section class="section">
                    <div class="section-body">
                        <div class="row mt-sm-12">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card author-box">
                                    <div class="card-body">
                                        <div class="author-box-center">
                                            <img alt="image" src="{{my_asset($ppdb->logo_ppdb)}}" style="max-width: 100px;">
                                            <div class="clearfix"></div>
                                            <div class="author-box-name">
                                                <h1 class="mb-0">{{$sett->school_name}}</h1>
                                                <div class="dropdown-divider" style="margin-top: -2px;"></div>
                                                <p style="margin-top: -5px;">{{$sett->school_address}}<br></p>
                                                <p style="margin-top: -20px;">Pendaftaran PPDB Tahun {{$data->gelombang_daftar->tahun->nama_tahunajaran}} | Gelombang {{$data->gelombang_daftar->nama_gelombang}} </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4>A. Informasi Umum</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="py-4">
                                            <p class="clearfix" style="font-size: 20px;">
                                                <span class="float-left">
                                                    Nama Lengkap Peserta
                                                </span>
                                                <span class="float-right text-muted">
                                                    {{$data->nama_lengkap}}
                                                </span>
                                            </p>
                                            <p class="clearfix" style="font-size: 20px;">
                                                <span class="float-left">
                                                    Jenis Kelamin
                                                </span>
                                                <span class="float-right text-muted">
                                                    {{$data->jenis_kelamin}}
                                                </span>
                                            </p>
                                            <p class="clearfix" style="font-size: 20px;">
                                                <span class="float-left">
                                                    Nomor Induk Siswa
                                                </span>
                                                <span class="float-right text-muted">
                                                    {{$data->nik}}
                                                </span>
                                            </p>
                                            <p class="clearfix" style="font-size: 20px;">
                                                <span class="float-left">
                                                    Tempat Tanggal Lahir
                                                </span>
                                                <span class="float-right text-muted">
                                                    {{$data->tanggal_lahir}} {{$data->tempat_lahir}}
                                                </span>
                                            </p>
                                            <p class="clearfix" style="font-size: 20px;">
                                                <span class="float-left">
                                                    Agama Dianut
                                                </span>
                                                <span class="float-right text-muted">
                                                    {{$data->agama}}
                                                </span>
                                            </p>

                                            <p class="clearfix" style="font-size: 20px;">
                                                <span class="float-left">
                                                    Transportasi Kesekolah
                                                </span>
                                                <span class="float-right text-muted">
                                                    {{$data->transportasi_sekolah}}
                                                </span>
                                            </p>
                                            <p class="clearfix" style="font-size: 20px;">
                                                <span class="float-left">
                                                    Nomor Telpon
                                                </span>
                                                <span class="float-right text-muted">
                                                    {{$data->no_phone}}
                                                </span>
                                            </p>
                                            @if($data->no_kps != null)
                                            <p class="clearfix" style="font-size: 20px;">
                                                <span class="float-left">
                                                    Nomor KPPS
                                                </span>
                                                <span class="float-right text-muted">
                                                    {{$data->no_kps}}
                                                </span>
                                            </p>
                                            @endif

                                            <p class="clearfix" style="font-size: 20px;">
                                                <span class="float-left">
                                                    Tinggi Badan
                                                </span>
                                                <span class="float-right text-muted">
                                                    {{$data->tinggi_badan}} CM
                                                </span>
                                            </p>
                                            <p class="clearfix" style="font-size: 20px;">
                                                <span class="float-left">
                                                    Jarak Rumah Kesekolah
                                                </span>
                                                <span class="float-right text-muted">
                                                    {{$data->jakar_kesekolah}} Km
                                                </span>
                                            </p>
                                            <p class="clearfix" style="font-size: 20px;">
                                                <span class="float-left">
                                                    Nomor Telpon
                                                </span>
                                                <span class="float-right text-muted">
                                                    {{$data->no_phone}}
                                                </span>
                                            </p>

                                            <p class="clearfix" style="font-size: 20px;">
                                                <span class="float-left">
                                                    Anak Ke
                                                </span>
                                                <span class="float-right text-muted">
                                                    {{$data->anak_ke}} dari <?= $data->jumlah_saudara != null ? $data->jumlah_saudara : '0'; ?> Saudara
                                                </span>
                                            </p>
                                            <p class="clearfix" style="font-size: 20px;">
                                                <span class="float-left">
                                                    Alamat Tinggal
                                                </span>
                                                <span class="float-right text-muted">
                                                    {{$data->alamat_tinggal}}
                                                </span>
                                            </p>
                                            <p class="clearfix" style="font-size: 20px;">
                                                <span class="float-left">
                                                    Alamat Asal
                                                </span>
                                                <span class="float-right text-muted">
                                                    {{$data->alamat_asal}}
                                                </span>
                                            </p>

                                        </div>

                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h4>B. Informasi Wali Murid</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="py-4">
                                            <p class="clearfix" style="font-size: 20px;">
                                                <span class="float-left">
                                                    Nama Ayah
                                                </span>
                                                <span class="float-right text-muted">
                                                    {{$data->nama_ayah}}
                                                </span>
                                            </p>
                                            <p class="clearfix" style="font-size: 20px;">
                                                <span class="float-left">
                                                    Nama Ibu
                                                </span>
                                                <span class="float-right text-muted">
                                                    {{$data->nama_ibu}}
                                                </span>
                                            </p>
                                            <p class="clearfix" style="font-size: 20px;">
                                                <span class="float-left">
                                                    Tanggal Lahir Ayah
                                                </span>
                                                <span class="float-right text-muted">
                                                    {{$data->tanggal_lahir_ayah}}
                                                </span>
                                            </p>
                                            <p class="clearfix" style="font-size: 20px;">
                                                <span class="float-left">
                                                    Tanggal Lahir Ibu
                                                </span>
                                                <span class="float-right text-muted">
                                                    {{$data->tanggal_lahir_ibu}}
                                                </span>
                                            </p>
                                            <p class="clearfix" style="font-size: 20px;">
                                                <span class="float-left">
                                                    Pendidikan Terakhir Ayah
                                                </span>
                                                <span class="float-right text-muted">
                                                    {{$data->pendidikan_ayah}}
                                                </span>
                                            </p>

                                            <p class="clearfix" style="font-size: 20px;">
                                                <span class="float-left">
                                                    Pendidikan Terakhir Ibu
                                                </span>
                                                <span class="float-right text-muted">
                                                    {{$data->pendidikan_ibu}}
                                                </span>
                                            </p>
                                            <p class="clearfix" style="font-size: 20px;">
                                                <span class="float-left">
                                                    Pekerjaan Ayah
                                                </span>
                                                <span class="float-right text-muted">
                                                    {{$data->pekerjaan_ayah}}
                                                </span>
                                            </p>

                                            <p class="clearfix" style="font-size: 20px;">
                                                <span class="float-left">
                                                    Pekerjaan Ibu
                                                </span>
                                                <span class="float-right text-muted">
                                                    {{$data->pekerjaan_ibu}}
                                                </span>
                                            </p>
                                            <p class="clearfix" style="font-size: 20px;">
                                                <span class="float-left">
                                                    Penghasilan Ayah
                                                </span>
                                                <span class="float-right text-muted">
                                                    {{$data->penghasilan_ayah}}
                                                </span>
                                            </p>
                                            <p class="clearfix" style="font-size: 20px;">
                                                <span class="float-left">
                                                    Penghasilan Ibu
                                                </span>
                                                <span class="float-right text-muted">
                                                    {{$data->penghasilan_ibu}}
                                                </span>
                                            </p>

                                            <p class="clearfix" style="font-size: 20px;">
                                                <span class="float-left">
                                                    Keterangan Ayah
                                                </span>
                                                <span class="float-right text-muted">
                                                    {{$data->keterangan_ayah}}
                                                </span>
                                            </p>
                                            <p class="clearfix" style="font-size: 20px;">
                                                <span class="float-left">
                                                    Keterangan Ibu
                                                </span>
                                                <span class="float-right text-muted">
                                                    {{$data->keterangan_ibu}}
                                                </span>
                                            </p>
                                            <p class="clearfix" style="font-size: 20px;">
                                                <span class="float-left">
                                                    Alamat Orangtua
                                                </span>
                                                <span class="float-right text-muted">
                                                    {{$data->alamat_tinggal_ortu}}
                                                </span>
                                            </p>

                                        </div>

                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h4>C. Document Kelengkapan Data</h4>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <tr>
                                                <th>Photo</th>
                                                <th>Akta Kelahiran</th>
                                                <th>Kartu Keluarga</th>
                                                @if($data->no_kps != null)
                                                <th>Kartu KPS</th>
                                                @endif
                                                <th>Ijazah Terakhir</th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    @if($data->photo != null)
                                                    <button class="btn btn-success">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                    @else
                                                    <button class="btn btn-danger">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                    @endif
                                                </th>
                                                <th>
                                                    @if($data->akta_kelahiran != null)
                                                    <button class="btn btn-success">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                    @else
                                                    <button class="btn btn-danger">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                    @endif
                                                </th>
                                                <th>
                                                    @if($data->kartu_keluarga != null)
                                                    <button class="btn btn-success">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                    @else
                                                    <button class="btn btn-danger">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                    @endif
                                                </th>
                                                @if($data->no_kps != null)
                                                <th>
                                                    @if($data->kps_kks != null)
                                                    <button class="btn btn-success">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                    @else
                                                    <button class="btn btn-danger">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                    @endif
                                                </th>
                                                @endif
                                                <th>
                                                    @if($data->ijazah_sekolah != null)
                                                    <button class="btn btn-success">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                    @else
                                                    <button class="btn btn-danger">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                    @endif
                                                </th>
                                            </tr>
                                        </table>

                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="py-4">
                                            <p class="clearfix" style="font-size: 20px;">
                                                <span class="float-left">
                                                    <?= QrCode::size(200)->generate(env('APP_URL').'/ppdb/app/register-ppdb/print-formulir/'.encrypt($data->id));?>
                                                </span>
                                                <span class="float-right text-muted">
                                                    <img src="{{my_asset($data->photo)}}" style="width: 200px;">
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>

            </div>

        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="{{my_asset('admin/theme/js/app.min.js')}}"></script>
    <!-- JS Libraies -->
    <script src="{{my_asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>

    <script src="{{my_asset('admin/theme/js/scripts.js')}}"></script>
    <!-- Custom JS File -->
    <script src="{{my_asset('admin/theme/js/custom.js')}}"></script>
</body>

</html>