@extends('backend.inc.app')
@section('content')
@section('style')
<link rel="stylesheet" href="{{my_asset('plugins/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{my_asset('plugins/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
@endsection
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>{{$page}}</h4>
                <div class="card-header-action">
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target=".add-tahun">
                        <i class="fa fa-plus"></i> Tambah Data
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun Ajaran</th>
                                <th>Nama Tahun Ajaran</th>
                                <th>Nama Angkatan</th>
                                <th>Gelombang Pendaftaran</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($data as $dt)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$dt->tahun_ajaran}}</td>
                                <td>{{$dt->nama_tahunajaran}}</td>
                                <td>{{$dt->nama_angkatan}}</td>
                                <td>{{count($dt->sesidaftar)}} Sesi</td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target=".update-tahun-{{$dt->id}}" class="btn btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('admin.delete.tahun',$dt->id)}}" class="btn btn-danger tombolhapus">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    @if($dt->status == 1)
                                    <a href="{{route('admin.tahun_active',$dt->id)}}" class="btn btn-warning">
                                        <i class="fa fa-warning"></i> Non Aktif
                                    </a>
                                    @else
                                    <a href="{{route('admin.tahun_active',$dt->id)}}" class="btn btn-primary">
                                        <i class="fa fa-check"></i> Aktifkan
                                    </a>
                                    @endif
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
@include('backend.partials.ppdb_tahun')
@section('script')
<script src="{{my_asset('plugins/datatables/datatables.min.js')}}"></script>
<script src="{{my_asset('plugins/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{my_asset('plugins/datatables/export-tables/dataTables.buttons.min.js')}}"></script>
<script src="{{my_asset('plugins/datatables/export-tables/buttons.flash.min.js')}}"></script>
<script src="{{my_asset('plugins/datatables/export-tables/jszip.min.js')}}"></script>
<script src="{{my_asset('plugins/datatables/export-tables/pdfmake.min.js')}}"></script>
<script src="{{my_asset('plugins/datatables/export-tables/vfs_fonts.js')}}"></script>
<script src="{{my_asset('plugins/datatables/export-tables/buttons.print.min.js')}}"></script>
<script src="{{my_asset('admin/theme/js/page/datatables.js')}}"></script>
@endsection
@endsection