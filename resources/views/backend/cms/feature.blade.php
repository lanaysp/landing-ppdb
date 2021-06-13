@extends('backend.inc.app')
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <button class="btn btn-primary float-lg-right" data-toggle="modal" data-target="#add-feature">
                    <i class="fa fa-plus"></i> Tambah Keunggulan
                </button>
            </div>
        </div>
    </div>
</div>

<div class="row">
    @foreach($data as $dt)
    <div class="col-xl-6 col-lg-6">
        <a href="#" style="text-decoration:none;" data-toggle="modal" data-target="#update-feature-{{$dt->id}}" class="card">
            <div class="card-body card-unggulan">
                <div class="row">
                    <div class="col">
                        <h6 class="text-muted mb-0">{{$dt->feature_title}}</h6>
                    </div>
                    <div class="col-auto">
                        @if($dt->feature_icon == null)
                        <div class="card-circle l-bg-orange text-white ">
                            <i class="fa fa-book-open"></i>
                        </div>
                        @else
                        <img src="{{my_asset($dt->feature_icon)}}" style="width: 80px;">
                        @endif
                    </div>
                </div>
                <p class="mt-3 mb-0 text-muted text-sm">
                    <p>{{$dt->feature_description}}</p>
                </p>
            </div>
        </a>
    </div>
    @endforeach

</div>

</div>
</section>
@include('backend.modal.feature')
@endsection