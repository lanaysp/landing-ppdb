@extends('user.app_ppdb')
@section('content')
<div class="row">
    <div class="col-12 col-sm-12 mt-3">
        <div class="card">
            <div class="card-header  justify-content-between align-items-center">
                <?php
                use App\SettPpdb;
                $setting   = SettPpdb::first();
                ?>
                @if($setting->offline == 'on')
                <h4 class="card-title">
                    <a class="btn btn-success content-left" target="_blank" href="{{my_asset($setting->file_pendaftaran)}}">
                        <i class="fa fa-download"></i> Unduh Formulir Pendaftaran Offline
                    </a>
                </h4>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table layout-primary">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Lengkap</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Tahun Ajaran</th>
                                <th scope="col">Gelombang</th>
                                <th scope="col">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $ppdb)
                            <tr>
                                <th scope="row">#</th>
                                <td> {{$ppdb->nama_lengkap}} </td>
                                <td> {{$ppdb->nik}} </td>
                                <td> {{$ppdb->gelombang_daftar->tahun->tahun_ajaran}} </td>
                                <td> {{$ppdb->gelombang_daftar->nama_gelombang}} </td>
                                <td>
                                    <a class="btn btn-info" target="_blank" href="{{route('ppdb.pdf_view',[encrypt($ppdb->id),strtolower(preg_replace("/[^a-zA-Z0-9]/","-",$ppdb->nik))])}}">
                                        <i class="fa fa-info-circle"></i> Detail Pdf
                                    </a>
                                    <a class="btn btn-info" target="_blank" href="{{route('card.ppdb_peserta',encrypt($ppdb->id))}}">
                                        <i class="fa fa-card"></i> Kartu Peserta
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection