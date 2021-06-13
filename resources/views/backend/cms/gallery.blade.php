@extends('backend.inc.app')
@section('content')
@section('style')
<link rel="stylesheet" href="{{my_asset('plugins/chocolat/dist/css/chocolat.css')}}">
<link rel="stylesheet" href="{{my_asset('plugins/dropify/css/dropify.min.css')}}">
@endsection
<div class="section-body">
    <div class="row">
        <div class="col-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-sm btn-primary" style="margin-right: 10px;" data-toggle="modal" data-target=".add">
                        <i class="fas fa-plus"></i> Tambah Gallery
                    </button>
                    <button class="btn btn-sm btn-warning" style="margin-right: 10px;" data-toggle="modal" data-target=".update">
                        <i class="fas fa-edit"></i> Update Gallery
                    </button>
                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target=".delete">
                        <i class="fas fa-trash"></i> Delete Gallery
                    </button>
                </div>
                <div class="card-body"> 
                    <div class="gallery gallery-md">
                        @foreach($data as $dt)
                        <div class="gallery-item" data-image="{{my_asset($dt->image)}}" data-title="{{$dt->caption_name}}"></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@include('backend.partials.gallery')
@section('script')
<script src="{{my_asset('plugins/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>
<script src="{{my_asset('admin/theme/js/page/gallery1.js')}}"></script>
<script src="{{my_asset('plugins/dropify/js/dropify.min.js')}}"></script>
<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();
    });
</script>
@endsection
@endsection