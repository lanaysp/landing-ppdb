@extends('backend.inc.app')
@section('content')
@section('style')
<link rel="stylesheet" href="{{my_asset('plugins/jqvmap/dist/jqvmap.min.css')}}">
@endsection

<div class="row">

    <!-- Card Student Total -->
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                                <h5 class="font-15">Total Pendaftaran</h5>
                                <h2 class="mb-3 font-18">{{count($data['totalregistration'])}}</h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                                <img src="{{my_asset('admin/theme/img/banner/1.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Card Student Total -->
    <!-- Card Teacher Total -->
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                                <h5 class="font-15"> Total Penerimaan</h5>
                                <h2 class="mb-3 font-18">{{count($data['ppdbaccept'])}}</h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                                <img src="{{my_asset('admin/theme/img/banner/2.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Card Teacher Total -->
    <!-- Card Guardiang Total -->
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                                <h5 class="font-15">Total Tidak Lulus</h5>
                                <h2 class="mb-3 font-18">{{count($data['ppdbreject'])}}</h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                                <img src="{{my_asset('admin/theme/img/banner/3.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Card Guardian Total -->
    <!-- Card Total Staff -->
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
            <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                                <h5 class="font-15">Total Gelombang</h5>
                                <h2 class="mb-3 font-18">{{count($data['totalgelombang'])}}</h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                                <img src="{{my_asset('admin/theme/img/banner/4.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Card Total Staff -->
</div>

<div class="row">
    <!-- Card Canteen Total -->
    <div class="col-xl-3 col-lg-6">
        <div class="card l-bg-green">
            <div class="card-statistic-3">
                <div class="card-icon card-icon-large"><i class="fa fa-newspaper"></i></div>
                <div class="card-content">
                    <h4 class="card-title">Total Berita</h4>
                    <h2>{{count($data['totalnews'])}}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- End Card Canteen Total -->
    <!-- Card Total Class -->
    <div class="col-xl-3 col-lg-6">
        <div class="card l-bg-cyan">
            <div class="card-statistic-3">
                <div class="card-icon card-icon-large"><i class="fa fa-child"></i></div>
                <div class="card-content">
                    <h4 class="card-title">Total Event</h4>
                    <h2>{{count($data['totalevent'])}}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- End Card Total Class -->
    <!-- Card Book Total -->
    <div class="col-xl-3 col-lg-6">
        <div class="card l-bg-purple">
            <div class="card-statistic-3">
                <div class="card-icon card-icon-large"><i class="fa fa-users"></i></div>
                <div class="card-content">
                    <h4 class="card-title">Total Pegawai</h4>
                    <h2>{{count($data['totalemployee'])}}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- End Card -->
    <!-- Card Problem Total -->
    <div class="col-xl-3 col-lg-6">
        <div class="card l-bg-orange">
            <div class="card-statistic-3">
                <div class="card-icon card-icon-large"><i class="fa fa-user"></i></div>
                <div class="card-content">
                    <h4 class="card-title">Total Pengguna</h4>
                    <h2>{{count($data['ppdbuser'])}}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- End Card -->
</div>

<div class="row">

    <!-- Income Total -->
    <div class="col-xl-4 col-lg-6">
        <div class="card">
            <div class="card-body card-type-3">
                <div class="row">
                    <div class="col">
                        <h6 class="text-muted mb-0">Pendaftaran Bulan ini</h6>
                        <span class="font-weight-bold mb-0">{{count($data['ppdbmont'])}}</span>
                    </div>
                    <div class="col-auto">
                        <div class="card-circle l-bg-orange text-white">
                            <i class="fas fa-calendar"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Card Income -->
    <!-- Expense Total -->
    <div class="col-xl-4 col-lg-6">
        <div class="card">
            <div class="card-body card-type-3">
                <div class="row">
                    <div class="col">
                        <h6 class="text-muted mb-0">Pendaftaran Minggu ini</h6>
                        <span class="font-weight-bold mb-0">{{count($data['ppdbweek'])}}</span>
                    </div>
                    <div class="col-auto">
                        <div class="card-circle l-bg-cyan text-white">
                            <i class="fas fa-calendar"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Expense Total -->

    <!-- Card Students Save today -->
    <div class="col-xl-4 col-lg-6">
        <div class="card">
            <div class="card-body card-type-3">
                <div class="row">
                    <div class="col">
                        <h6 class="text-muted mb-0">Total Pendaftaran Tahun ini</h6>
                        <span class="font-weight-bold mb-0">{{count($data['ppdbyear'])}}</span>
                    </div>
                    <div class="col-auto">
                        <div class="card-circle l-bg-green text-white">
                            <i class="fas fa-calendar"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Card -->
</div>

<div class="row">
    <div class="col-md-12 col-lg-6 col-xl-6">
        <div class="card">
            <div class="card-header">
                <h4>Analytic Pendaftaran Tahun ini</h4>
            </div>
            <div class="card-body">
                <div id="analytictahunan"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-6 col-xl-6">
        <div class="card">
            <div class="card-header">
                <h4>Pendaftaran dari bulan ke bulan</h4>
            </div>
            <div class="card-body">
                <div id="ppdbmonth"></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4>Pendaftaran Akhir - Akhir ini</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive" id="proTeamScroll">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th>Photo</th>
                                <th>Nama Peserta</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Tempat Lahir</th>
                                <th>Agama</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        @foreach($data['ppdbnew'] as $ppdb)
                        <tr>
                            <td class="table-img">
                                @if($ppdb->photo != null)
                                <img src="{{my_asset($ppdb->photo)}}" alt="">
                                @endif
                            </td>
                            <td>
                                <h6 class="mb-0 font-13">{{$ppdb->nama_lengkap}}</h6>
                                <p class="m-0 font-12">
                                     <span class="col-green font-weight-bold">{{$ppdb->nik}}</span>
                                </p>
                            </td>
                            <td>
                               {{$ppdb->jenis_kelamin}}
                            </td>
                            <td class="text-truncate">{{$ppdb->tanggal_lahir}}</td>
                            <td>
                                <div class="badge-outline col-red">{{$ppdb->tempat_lahir}}</div>
                            </td>
                            <td class="align-middle">{{$ppdb->agama}}</td>
                            <td>{{$ppdb->status}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-12 col-sm-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4>Persentase Penerimaan Siswa/i</h4>
            </div>
            <div class="card-body">
                <div id="persentase"></div>
              
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4>Analytic Lulus & Tidak Lulus</h4>
            </div>
            <div class="card-body">
                <div id="lulusDantidak"></div>
            </div>
        </div>
    </div>
</div>


@section('script')
<script src="{{my_asset('plugins/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{my_asset('plugins/jqvmap/dist/jquery.vmap.min.js')}}"></script>
<script src="{{my_asset('admin/theme/js/page/dashboard.js')}}"></script>
@endsection
@endsection