@extends('user.app_ppdb')
@section('content')
<div class="row mt-3">
    <div class="col-12 col-sm-12">
        <div class="row mb-5">
            @foreach($data as $beasiswa)
            <div class="col-12 col-sm-6 col-xl-4 mb-4">
                <div class="card redial-border-light redial-shadow">
                    <img class="img-fluid rounded-top" src="{{my_asset($beasiswa->image)}}" style="height:230px;" alt="">
                    <div class="card-body">
                        <h4 class="card-title">{{$beasiswa->title}}</h4>
                        <?= substr($beasiswa->deskripsi, 0, 110); ?>
                        <div class="clearfix"></div>
                        <a href="{{route('ppdb.beasiswa.detail',[$beasiswa->id,strtolower(preg_replace("/[^a-zA-Z0-9]/","-",$beasiswa->title))])}}" class="btn btn-primary mt-2">Detail Beasiswa</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection