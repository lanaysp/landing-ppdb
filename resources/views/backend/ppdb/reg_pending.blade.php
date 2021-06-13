@extends('backend.inc.app')
@section('content')
@section('style')
<link rel="stylesheet" href="{{my_asset('plugins/datatables/datatables.min.css')}}">
@endsection
<div class="row">
    <div class="col-12">


        <div class="card">
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Nama Peserta</th>
                                <th>Tahun Ajaran</th>
                                <th>Gelombang Pendaftaran</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Photo</th>
                                <th>Tanggal Daftar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $reg)
                            <tr>
                                <td>{{$reg->nama_lengkap}} </td>
                                <td>{{$reg->gelombang_daftar->tahun->nama_tahunajaran}} </td>
                                <td>{{$reg->gelombang_daftar->nama_gelombang}} </td>
                                <td>{{$reg->no_phone}} </td>
                                <td>
                                    @if($reg->status == 'pending')
                                    <span class="badge bg-warning text-white">{{$reg->status}}</span></h1>
                                    @elseif($reg->status == 'diterima')
                                    <span class="badge bg-success text-white">{{$reg->status}}</span></h1>
                                    @endif
                                </td>
                                <td>
                                    <img src="{{my_asset($reg->photo)}}" style="max-width: 60px;">
                                </td>
                                <td>{{$reg->created_at}} </td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{route('admin.detail.ppdb',encrypt($reg->id))}}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-sm btn-warning text-white" href="{{route('admin.ppdb.update',encrypt($reg->id))}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-sm btn-danger text-white tombolhapus" href="{{route('admin.ppdb.delete',encrypt($reg->id))}}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    @if($reg->status == 'pending')
                                    <a class="btn btn-sm btn-danger text-white tomboltolak" href="{{route('admin.ppdb.action',['tolak',encrypt($reg->id)])}}">
                                        <i class="fa fa-exclamation-triangle"></i>
                                    </a>
                                    <a class="btn btn-sm btn-success text-white tombolpilih" href="{{route('admin.ppdb.action',['pilih',encrypt($reg->id)])}}">
                                        <i class="fa fa-check"></i>
                                    </a>
                                    @elseif($reg->status == 'diterima')
                                    <a class="btn btn-sm btn-danger text-white tomboltolak" href="{{route('admin.ppdb.action',['tolak',encrypt($reg->id)])}}">
                                        <i class="fa fa-exclamation-triangle"></i>
                                    </a>
                                    @elseif($reg->status == 'ditolak')
                                    <a class="btn btn-sm btn-success text-white tombolpilih" href="{{route('admin.ppdb.action',['pilih',encrypt($reg->id)])}}">
                                        <i class="fa fa-check"></i>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="float-right">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
@section('script')
<script src="{{my_asset('plugins/datatables/datatables.min.js')}}"></script>
<script src="{{my_asset('admin/theme/js/page/datatables.js')}}"></script>
@endsection
@endsection