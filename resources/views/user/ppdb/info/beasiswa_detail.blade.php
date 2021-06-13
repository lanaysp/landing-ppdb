@extends('user.app_ppdb')
@section('content')
<div class="row">
    <div class="col-12 col-xl-8 mb-5 mb-xl-0">
        <div class="card mb-4">
            <img src="{{my_asset($data->image)}}" alt="" class="img-fluid rounded-top">
            <div class="card-body">
                <ul class="list-inline comment-info font-weight-bold">
                    <li class="list-inline-item"><a href="#"><i class="fa fa-calendar pr-1"></i>Tahun Ajaran {{$data->tahun->tahun_ajaran}} </a></li>
                </ul>
                <a href="#">
                    <h4>{{$data->title}}</h4>
                </a>
                <?= $data->deskripsi; ?>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-4">
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

     
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Beasiswa Lainnya</h4>
            </div>
            <div class="card-body">
                @foreach($other as $lainnya)
                <a href="{{route('ppdb.beasiswa.detail',[$lainnya->id,strtolower(preg_replace("/[^a-zA-Z0-9]/","-",$lainnya->title))])}}" class="media d-block d-sm-flex text-center text-sm-left mb-4">
                    <img class="img-fluid d-md-flex mr-sm-4" style="max-width: 100px;" src="{{my_asset($lainnya->image)}}" alt="">
                    <div class="media-body align-self-center redial-line-height-1_5">
                        <h6 class="my-2 my-sm-0 redial-line-height-1_5 mb-xl-2">{{$lainnya->title}}</h6>
                      Tahun Ajaran {{$lainnya->tahun->tahun_ajaran}}
                    </div>
                </a>
                @endforeach
            </div>
        </div>


    </div>
</div>
@endsection