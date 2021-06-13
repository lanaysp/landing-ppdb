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
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target=".add-kategori">
                        <i class="fa fa-plus"></i> Tambah Kategori
                    </button>
                </div>
            </div>
            <div class="card-body ">
                <div class="table-responsive">
                    <table class="table table-striped" id="sortable-table">
                        <thead>
                            <tr>
                                <th>Nama Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $dt)
                            <tr>
                                <td>{{$dt->name}} </td>
                                <td>
                                    <a href="#" class="btn btn-warning text-white" data-toggle="modal" data-target=".update-kategori{{$dt->id}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('document.delete.category',$dt->id)}}" class="btn btn-danger text-white tombolhapus">
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
@include('backend.modal.doc_kategori')
@section('script')
<script src="{{my_asset('admin/theme/js/page/advance-table.js')}}"></script>
@endsection
@endsection