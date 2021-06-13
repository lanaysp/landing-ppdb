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
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target=".add-tanda">
                        <i class="fa fa-plus"></i> Tambah Tanda Tangan
                    </button>
                </div>
            </div>
            <div class="card-body ">
                <div class="table-responsive">
                    <table class="table table-striped" id="sortable-table">
                        <thead>
                            <tr>
                                
                                <th>Nama Pegawai</th>
                                <th>Tanda Tangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $dt)
                            <tr>
                               
                                <td>{{$dt->employee->first_name}} {{$dt->employee->middle_name}} {{$dt->employee->last_name}}</td>
                                <td>
                                    <img src="{{my_asset($dt->image)}}" width="200px">
                                </td>
                                <td>
                                    <a href="#" class="btn btn-warning text-white" data-toggle="modal" data-target=".update-tanda{{$dt->id}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('document.delete.tanda',$dt->id)}}" class="btn btn-danger text-white tombolhapus">
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
@include('backend.modal.tanda_tangan')
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