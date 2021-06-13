@extends('user.app_ppdb')
@section('content')
<div class="row">
    @foreach($data as $other)
    <div class="col-12 col-md-6 col-lg-6 mt-3">
        <div class="card border">
            <div class="card-content">
                <div class="card-body p-4">
                    <div class="d-md-flex">
                        <div class="my-auto">
                            <img src="{{my_asset('admin/users/images/info.png')}}" alt="author" width="48" class="my-auto">
                        </div>
                        <div class="content px-md-3 my-3 my-md-0">
                            <span class="mb-0 font-w-600 h5">{{$other->title}}</span><br>
                            <p class="mb-0 font-w-500 tx-s-12"><?= substr($other->description, 0, 150); ?></p>
                        </div>
                        <div class="my-auto">
                            <a href="#" data-toggle="modal" data-target="#detail-info-{{$other->id}}" class="btn btn-outline-primary font-w-600 my-auto text-nowrap">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@include('user.partials.other_info')
@endsection