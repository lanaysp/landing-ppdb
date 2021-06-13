@extends('user.app_ppdb')
@section('content')
<div class="row">
    <div class=" col-sm-12 col-lg-12 col-xl-8  mt-3">
        <div class="card">
            <div class="card-header  justify-content-between align-items-center">
                <h4 class="card-title">Gelombang Pendaftaran Tahun <b>{{$data->tahun_ajaran}}</b> </h4>
            </div>
            <div class="card-body">
                <ul class="timeline-app">
                    @php
                    $no = 1;
                    @endphp
                    @foreach($data->sesidaftar as $gelombang)
                    @php
                    $position = $no++;
                    @endphp
                    <li class="timeline-item  <?= $position  % 2 == 0 ? 'reverse' : null; ?>">
                        <div class="timeline-dot"><i class="icon-user icons"></i></div>

                        <div class="card w-100 overflow-hidden">
                            <div class="card-block p-3">
                                <h3 class="card-title">{{$gelombang->nama_gelombang}}</h3>
                                <p class="card-text">
                                    <small>Tahun Ajaran {{$gelombang->tahun->tahun_ajaran}} </small>
                                </p>
                                <p>Dimulai Pada Awal Tanggal <b> {{$gelombang->mulai_tanggal}} - {{$gelombang->tanggal_akhir}} </b> </p>
                                @if($gelombang->mulai_tanggal < date('Y-m-d') && $gelombang->tanggal_akhir > date('Y-m-d'))
                                    <a class="btn btn-info btn-outline card-link" href="{{route('ppdb.reg',encrypt($gelombang->id))}}">Daftar</a>
                                    @elseif ($gelombang->tanggal_akhir < date('Y-m-d'))
                                    <a class="btn btn-primary btn-outline card-link" href="#">Ditutup</a>
                                    @else
                                    <a class="btn btn-primary btn-outline card-link" href="#">Belum Dibuka</a>
                                    @endif
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class=" col-md-4 col-sm-12 mt-3">
        <div class="card">
            <div class="card-header  justify-content-between align-items-center">
                <h4 class="card-title">Petunjuk Pendaftaran</h4>
            </div>
            <div class="card-body">
                <div id="accordion2" class="accordion-alt" role="tablist">
                    @php
                    $no = 1;
                    $num = 1;
                    $nim = 1;
                    @endphp
                    @foreach($guide as $petunjuk)
                    <div class="mb-2">
                        <h6 class="mb-0">
                            <a class="text-uppercase  d-block border" data-toggle="collapse" href="#collapse<?= $num++; ?>" aria-expanded="true" aria-controls="collapse4">
                                {{$petunjuk->title}}
                            </a>
                        </h6>
                        <div id="collapse<?= $nim++; ?>" class="collapse <?= $no++ == 1 ? 'show' : null; ?>" role="tabpanel" data-parent="#accordion2">
                            <div class="card-body">
                                <?= $petunjuk->description; ?>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection