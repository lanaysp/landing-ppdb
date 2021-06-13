@extends('user.app_ppdb')
@section('content')
<div class="row mt-3">
    <div class="col-12 col-sm-12">

        <div class="row">
            <div class="col-12 col-xl-9 mb-5 mb-xl-0">
                <div class="card mb-4">
                    <div class="card-body">
                        <ul class="list-inline comment-info font-weight-bold">
                            <li class="list-inline-item  mr-3"><i class="fa fa-user pr-1 text-primary"></i> <a href="#" class="text-primary"> {{$data->pengguna->first_name}} {{$data->pengguna->middle_name}} {{$data->pengguna->last_name}}</a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-comments pr-1"></i> {{count($data->komentar)}} Ulasan</a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-calendar pr-1"></i> Dibuat Tanggal {{$data->created_at}} </a></li>
                        </ul>
                        <a href="#">
                            <h4>{{$data->title}}</h4>
                        </a>
                        <blockquote class="blockquote my-4 p-5 bg-primary position-relative text-white rounded">
                            <p class="font-weight-bold">{{$data->description}}</p>
                            <p>-{{$data->pengguna->first_name}} {{$data->pengguna->middle_name}} {{$data->pengguna->last_name}}</p>
                        </blockquote>

                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body pb-0">
                        <h5 class="header-title  text-uppercase mb-2">{{count($data->komentar)}} Ulasan</h5>
                    </div>
                    @foreach($data->komentar as $komentar)
                    <div class="media d-block d-sm-flex text-center text-sm-left p-4">
                        @if($komentar->pengguna->type_account == 'ppdb')
                        <img class="img-fluid d-md-flex mr-sm-4 rounded-circle" style="max-width: 60px;" src="{{my_asset($komentar->pengguna->image)}}" alt="">
                        @else
                        <img class="img-fluid d-md-flex mr-sm-4 rounded-circle" style="max-width: 60px;" src="{{my_asset($komentar->pengguna->employee->photo)}}" alt="">
                        @endif
                        <div class="media-body align-self-center">
                            <div class="float-sm-right float-none h6 mb-0 my-3 my-sm-0"> </div>
                            @if($komentar->pengguna->type_account == 'ppdb')
                            <h6 class="mb-1 font-weight-bold">{{$komentar->pengguna->first_name}} {{$komentar->pengguna->middle_name}} {{$komentar->pengguna->last_name}}</h6>
                            @else
                            <h6 class="mb-1 font-weight-bold">{{$komentar->pengguna->employee->first_name}} {{$komentar->pengguna->employee->middle_name}} {{$komentar->pengguna->employee->last_name}}</h6>
                            @endif
                            {{$komentar->description}} - <b>{{$komentar->created_at}}</b>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="header-title mb-3 text-uppercase">Berikan Ulasan</h5>
                        <form action="{{route('ppdb.reply_forum')}}" method="POST" class="row">
                            {{csrf_field()}}
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="hidden" name="forum_id" value="{{encrypt($data->id)}}">
                                    <textarea class="form-control height-200" name="description" placeholder="Tulis Ulasan / Balasan :"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-md">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <form action="{{route('ppdb.forum')}}" method="GET">
                            <div class="form-group mb-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Cari Tema Diskusi">
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Forum Diskusi Terbaru</h4>
                    </div>
                    <div class="card-body">
                        @foreach($baru as $br)
                        <div class="media d-block d-sm-flex text-center text-sm-left mb-4">
                            <div class="media-body align-self-center redial-line-height-1_5">
                                <a href="{{route('ppdb.detail_forum',encrypt($br->id))}}">
                                    <h6 class="my-2 my-sm-0 redial-line-height-1_5 mb-xl-2">{{$br->title}}</h6>
                                </a>
                                {{$br->created_at}}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>


            </div>
        </div>

    </div>
</div>
@endsection