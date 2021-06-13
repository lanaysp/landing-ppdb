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
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target=".add-template">
                        <i class="fa fa-plus"></i> Buat Template
                    </button>
                </div>
            </div>
            <div class="card-body ">
                <div class="table-responsive">
                    <table class="table table-striped" id="sortable-table">
                        <thead>
                            <tr>
                                <th>Nama Template</th>
                                <th>Nama Sekolah</th>
                                <th>Logo</th>
                                <th>background</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $dt)
                            <tr>
                                <td>{{$dt->template_name}}</td>
                                <td>{{$dt->school_name}}</td>
                                <td> <img src="{{my_asset($dt->school_logo)}}" width="100px" height="50px"> </td>
                                <td> <img src="{{my_asset($dt->background)}}" width="50px" height="100px"> </td>
                                <td>
                                    <a href="#" class="btn btn-warning text-white" data-toggle="modal" data-target=".update-template{{$dt->id}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('document.delete.template',$dt->id)}}" class="btn btn-danger text-white tombolhapus">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <a href="{{route('document.detail.template',$dt->id)}}" target="_blank" class="btn btn-info text-white">
                                        <i class="fa fa-eye"></i>
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
@include('backend.modal.doc_template')
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