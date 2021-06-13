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
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target=".add-gelombang">
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
                                <th>Nama Angkatan</th>
                                <th>Nama Gelombang</th>
                                <th>Dari Tanggal</th>
                                <th>Sampai Tanggal</th>
                                <th>Jumlah Pendaftar</th>
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
                                <td>{{$dt->tahun->tahun_ajaran}}</td>
                                <td>{{$dt->tahun->nama_angkatan}}</td>
                                <td>{{$dt->nama_gelombang}}</td>
                                <td>{{$dt->mulai_tanggal}}</td>
                                <td>{{$dt->tanggal_akhir}}</td>
                                <td>
                                    <span class="badge bg-primary text-white">{{count($dt->pendaftar)}}</span>
                                </td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target=".update-gelombang-{{$dt->id}}" class="btn btn-warning text-white">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('admin.gelombang.delete',$dt->id)}}" class="btn btn-danger tombolhapus text-white">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <a href="{{route('admin.ppdb.bygelombang',encrypt($dt->id))}}" class="btn btn-info text-white">
                                        <i class="fa fa-list"></i>
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
@include('backend.partials.ppdb_gelombang')
@section('script')
<script src="{{my_asset('plugins/datatables/datatables.min.js')}}"></script>
<script src="{{my_asset('admin/theme/js/page/datatables.js')}}"></script>
@endsection
@endsection