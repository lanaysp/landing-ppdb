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
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target=".add-mapel">
                        <i class="fa fa-plus"></i> Tambah Mapel
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
                                <th>Kode Mapel</th>
                                <th>Nama Mapel</th>
                                <th>Guru Mapel</th>
                                <th>Mapel Image</th>
                                <th>Unggulan</th>
                                <th>Status</th>
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
                                <td>{{$dt->mapel_code}}</td>
                                <td>{{$dt->mapel_name}}</td>
                                <td>{{$dt->teacher->employee->username}}</td>
                                <td>
                                    @if($dt->mapel_image != null)
                                    <img src="{{my_asset($dt->mapel_image)}}" width="80px">
                                    @endif
                                </td>
                                <td>
                                    @if($dt->featured == 1)
                                    Ya
                                    @else
                                    Tidak
                                    @endif
                                </td>
                                <td>
                                    @if($dt->status == 1)
                                    Aktif
                                    @else
                                    Tidak
                                    @endif
                                </td>
                                <td>
                                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target=".edit-mapel-{{$dt->id}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('delete.mapel',$dt->id)}}" class="btn btn-danger tombolhapus">
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
@include('backend.partials.mapel')
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