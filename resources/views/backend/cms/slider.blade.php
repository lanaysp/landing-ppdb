@extends('backend.inc.app')
@section('content')
@section('style')
<link rel="stylesheet" href="{{my_asset('plugins/dropify/css/dropify.min.css')}}">
@endsection
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>{{$page}}</h4>
                <div class="card-header-action">
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target=".add-slider">
                        <i class="fa fa-plus"></i> Tambah Slider
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped" id="sortable-table">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    <i class="fas fa-th"></i>
                                </th>
                                <th>Title Slider</th>
                                <th>Image Slider</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $dt)
                            <tr>
                                <td>
                                    <div class="sort-handler">
                                        <i class="fas fa-th"></i>
                                    </div>
                                </td>
                                <td>{{$dt->title_slider}}</td>

                                <td>
                                    <img src="{{my_asset($dt->image_slider)}}" width="200px">
                                </td>
                                <td>
                                    @if($dt->type == 1)
                                    Modern Website
                                    @else
                                    Classic Website
                                    @endif
                                </td>
                                <td>
                                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target=".update-slider{{$dt->id}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('cms.page',['set_modern',$dt->id])}}" class="btn btn-success">
                                        <i class="fa fa-check"></i>
                                    </a>
                                    <a href="{{route('cms.page',['delSlider',$dt->id])}}" class="btn btn-danger tombolhapus">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
@include('backend.partials.slider')
@section('script')
<script src="{{my_asset('admin/theme/js/page/advance-table.js')}}"></script>

<script src="{{my_asset('plugins/dropify/js/dropify.min.js')}}"></script>
<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();
    });
</script>
@endsection
@endsection