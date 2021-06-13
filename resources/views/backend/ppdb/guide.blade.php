@extends('backend.inc.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-primary float-lg-right" data-toggle="modal" data-target="#add-petunjuk">
                            <i class="fa fa-plus"></i> Tambah Petunjuk
                        </button>
                    </div>
                </div>
            </div>
            @foreach($data as $dt)
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card author-box card-primary">
                    <div class="card-body">
                        <div class="author-box-left">
                            <i class="fas fa-info-circle" style="color:blue; font-size:60px"></i>
                            <div class="clearfix"></div>
                            <a href="{{route('admin.detail_guide',[$dt->id,strtolower(preg_replace("/[^a-zA-Z0-9]/","-",$dt->title))])}}" class="btn btn-primary mt-3 follow-btn">Detail</a>
                        </div>
                        <div class="author-box-details">
                            <div class="author-box-name">
                                <a href="#">{{$dt->title}}</a>
                            </div>
                            <div class="author-box-job">{{$dt->archivement_date}}</div>
                            <div class="author-box-description">
                                <?= substr($dt->description, 0, 300); ?>...
                            </div>

                            <div class="w-100 d-sm-none"></div>
                            <div class="float-right mt-sm-0 mt-3">
                                <a href="#" data-toggle="modal" data-target="#update-petunjuk-{{$dt->id}}" class="btn">Edit Petunjuk <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $data->links() }}

    </div>
</div>
</div>
</section>
@include('backend.modal.guide')
@endsection