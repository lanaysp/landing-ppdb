@extends('backend.inc.app')
@section('content')
@section('style')
<link rel="stylesheet" href="{{my_asset('plugins/summernote/summernote-bs4.css')}}">
<link rel="stylesheet" href="{{my_asset('plugins/chocolat/dist/css/chocolat.css')}}">
<link rel="stylesheet" href="{{my_asset('plugins/dropify/css/dropify.min.css')}}">
@endsection
<div class="section-body">
    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-4">
            <div class="card author-box">
                <div class="card-body">
                    <div class="author-box-center">
                        <img alt="image" src="{{my_asset($data->photo)}}" class="rounded-circle author-box-picture">
                        <div class="clearfix"></div>
                        <div class="author-box-name">
                            <a href="#">{{$data->nama_lengkap}}</a>
                        </div>
                        <div class="author-box-job mt-2">{{$data->alamat_tinggal}}</div>
                    </div>

                </div>
            </div>
            <div class="card">

                <div class="card-body">
                    <p class="clearfix">
                        <span class="float-left">
                            <a class="btn btn-info  text-white" target="_blank" href="{{route('admin.pdf.ppdb',encrypt($data->id))}}">
                                <i class="fa fa-print"></i> Cetak Pendaftaran
                            </a>
                        </span>
                        <span class="float-right text-muted">
                            <a class="btn btn-info  text-white" target="_blank" href="{{route('admin.card.ppdb',encrypt($data->id))}}">
                                <i class="fa fa-id-card"></i> Cetak Kartu
                            </a>
                        </span>
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Document</h4>
                </div>
                <div class="card-body">
                    <p class="clearfix">
                        <span class="float-left">
                            Akta Kelahiran
                        </span>
                        <span class="float-right text-muted">
                            @if($data->akta_kelahiran != null)
                            <a href="{{my_asset($data->akta_kelahiran)}}" target="_blank" class="btn btn-success">
                                <i class="fa fa-download"></i> Unduh Data
                            </a>
                            @else
                            <button class="btn btn-danger">
                                <i class="fa fa-times"></i> Tidak Terlampir
                            </button>
                            @endif
                        </span>
                    </p>

                    <p class="clearfix">
                        <span class="float-left">
                            Kartu Keluarga
                        </span>
                        <span class="float-right text-muted">
                            @if($data->kartu_keluarga != null)
                            <a href="{{my_asset($data->kartu_keluarga)}}" target="_blank" class="btn btn-success">
                                <i class="fa fa-download"></i> Unduh Data
                            </a>
                            @else
                            <button class="btn btn-danger">
                                <i class="fa fa-times"></i> Tidak Terlampir
                            </button>
                            @endif
                        </span>
                    </p>

                    @if($data->no_kps != null)
                    <p class="clearfix">
                        <span class="float-left">
                            Kartu KPS
                        </span>
                        <span class="float-right text-muted">
                            @if($data->kps_kks != null)
                            <a href="{{my_asset($data->kps_kks)}}" target="_blank" class="btn btn-success">
                                <i class="fa fa-download"></i> Unduh Data
                            </a>
                            @else
                            <button class="btn btn-danger">
                                <i class="fa fa-times"></i> Tidak Terlampir
                            </button>
                            @endif
                        </span>
                    </p>
                    @endif

                    <p class="clearfix">
                        <span class="float-left">
                            Ijazah Sekolah
                        </span>
                        <span class="float-right text-muted">
                            @if($data->ijazah_sekolah != null)
                            <a href="{{my_asset($data->ijazah_sekolah)}}" target="_blank" class="btn btn-success">
                                <i class="fa fa-download"></i> Unduh Data
                            </a>
                            @else
                            <button class="btn btn-danger">
                                <i class="fa fa-times"></i> Tidak Terlampir
                            </button>
                            @endif
                        </span>
                    </p>

                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-8">
            <div class="card">
                <div class="padding-20">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#umum" role="tab" aria-selected="true">Informasi Umum</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#wali" role="tab" aria-selected="false">Informasi Wali Murid</a>
                        </li>
                    </ul>
                    <div class="tab-content tab-bordered" id="myTab3Content">
                        <div class="tab-pane fade show active" id="umum" role="tabpanel" aria-labelledby="home-tab2">
                            <div class="row">
                                <div class="col-md-12 col-12 b-r">
                                    <div class="py-4">
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Nama Lengkap Peserta
                                            </span>
                                            <span class="float-right text-muted">
                                                {{$data->nama_lengkap}}
                                            </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Jenis Kelamin
                                            </span>
                                            <span class="float-right text-muted">
                                                {{$data->jenis_kelamin}}
                                            </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Nomor Induk Siswa
                                            </span>
                                            <span class="float-right text-muted">
                                                {{$data->nik}}
                                            </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Tempat Tanggal Lahir
                                            </span>
                                            <span class="float-right text-muted">
                                                {{$data->tanggal_lahir}} {{$data->tempat_lahir}}
                                            </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Agama Dianut
                                            </span>
                                            <span class="float-right text-muted">
                                                {{$data->agama}}
                                            </span>
                                        </p>

                                        <p class="clearfix">
                                            <span class="float-left">
                                                Transportasi Kesekolah
                                            </span>
                                            <span class="float-right text-muted">
                                                {{$data->transportasi_sekolah}}
                                            </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Nomor Telpon
                                            </span>
                                            <span class="float-right text-muted">
                                                {{$data->no_phone}}
                                            </span>
                                        </p>
                                        @if($data->no_kps != null)
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Nomor KPPS
                                            </span>
                                            <span class="float-right text-muted">
                                                {{$data->no_kps}}
                                            </span>
                                        </p>
                                        @endif

                                        <p class="clearfix">
                                            <span class="float-left">
                                                Tinggi Badan
                                            </span>
                                            <span class="float-right text-muted">
                                                {{$data->tinggi_badan}} CM
                                            </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Jarak Rumah Kesekolah
                                            </span>
                                            <span class="float-right text-muted">
                                                {{$data->jakar_kesekolah}} Km
                                            </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Nomor Telpon
                                            </span>
                                            <span class="float-right text-muted">
                                                {{$data->no_phone}}
                                            </span>
                                        </p>

                                        <p class="clearfix">
                                            <span class="float-left">
                                                Anak Ke
                                            </span>
                                            <span class="float-right text-muted">
                                                {{$data->anak_ke}} dari <?= $data->jumlah_saudara != null ? $data->jumlah_saudara : '0'; ?> Saudara
                                            </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Alamat Tinggal
                                            </span>
                                            <span class="float-right text-muted">
                                                {{$data->alamat_tinggal}}
                                            </span>
                                        </p>
                                        <p class="clearfix">
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
                        </div>
                        <div class="tab-pane fade" id="wali" role="tabpanel" aria-labelledby="profile-tab2">
                            <div class="row">
                                <div class="col-12">
                                    <div class="py-4">
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Nama Ayah
                                            </span>
                                            <span class="float-right text-muted">
                                                {{$data->nama_ayah}}
                                            </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Nama Ibu
                                            </span>
                                            <span class="float-right text-muted">
                                                {{$data->nama_ibu}}
                                            </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Tanggal Lahir Ayah
                                            </span>
                                            <span class="float-right text-muted">
                                                {{$data->tanggal_lahir_ayah}}
                                            </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Tanggal Lahir Ibu
                                            </span>
                                            <span class="float-right text-muted">
                                                {{$data->tanggal_lahir_ibu}}
                                            </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Pendidikan Terakhir Ayah
                                            </span>
                                            <span class="float-right text-muted">
                                                {{$data->pendidikan_ayah}}
                                            </span>
                                        </p>

                                        <p class="clearfix">
                                            <span class="float-left">
                                                Pendidikan Terakhir Ibu
                                            </span>
                                            <span class="float-right text-muted">
                                                {{$data->pendidikan_ibu}}
                                            </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Pekerjaan Ayah
                                            </span>
                                            <span class="float-right text-muted">
                                                {{$data->pekerjaan_ayah}}
                                            </span>
                                        </p>

                                        <p class="clearfix">
                                            <span class="float-left">
                                                Pekerjaan Ibu
                                            </span>
                                            <span class="float-right text-muted">
                                                {{$data->pekerjaan_ibu}}
                                            </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Penghasilan Ayah
                                            </span>
                                            <span class="float-right text-muted">
                                                {{$data->penghasilan_ayah}}
                                            </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Penghasilan Ibu
                                            </span>
                                            <span class="float-right text-muted">
                                                {{$data->penghasilan_ibu}}
                                            </span>
                                        </p>

                                        <p class="clearfix">
                                            <span class="float-left">
                                                Keterangan Ayah
                                            </span>
                                            <span class="float-right text-muted">
                                                {{$data->keterangan_ayah}}
                                            </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Keterangan Ibu
                                            </span>
                                            <span class="float-right text-muted">
                                                {{$data->keterangan_ibu}}
                                            </span>
                                        </p>
                                        <p class="clearfix">
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
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@section('script')
<script src="{{my_asset('plugins/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>
<script src="{{my_asset('admin/theme/js/page/gallery1.js')}}"></script>
<script src="{{my_asset('plugins/summernote/summernote-bs4.js')}}"></script>

<script src="{{my_asset('plugins/dropify/js/dropify.min.js')}}"></script>
<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();
    });
</script>
@endsection
@endsection