@extends('backend.inc.app')
@section('content')
<div class="section-body">
    <div class="col-sm-12 col-lg-4">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#add-history">
                            <i class="fa fa-plus"></i> Tambah Sejarah Sekolah
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="activities"> 
                @foreach($data as $dt)
                <div class="activity">
                    <div class="activity-icon bg-primary text-white">
                        <i class="fas fa-history"></i>
                    </div>
                    <div class="activity-detail">
                        <div class="mb-2">
                            <span class="text-job">{{$dt->start_date}} - {{$dt->end_date}}</span>
                            <span class="bullet"></span>
                            <div class="float-right dropdown">
                                <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                <div class="dropdown-menu">
                                    <div class="dropdown-title">Options</div>
                                    <a href="#" class="dropdown-item has-icon" data-target="#update{{$dt->id}}" data-toggle="modal"><i class="fas fa-edit"></i> Update</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="/administrator/cms/historyDelete/{{$dt->id}}" class="dropdown-item has-icon text-danger tombolhapus"><i class="fas fa-trash-alt"></i> Delete</a>
                                </div>
                            </div>
                        </div>
                        <h4>{{$dt->title}}</h4>
                        <p>{{$dt->description}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
</section>
@include('backend.partials.history')
@endsection