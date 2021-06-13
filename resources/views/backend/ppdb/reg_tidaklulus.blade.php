@extends('backend.inc.app')
@section('content')
@section('style')
<link rel="stylesheet" href="{{my_asset('plugins/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{my_asset('plugins/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{my_asset('plugins/select2/dist/css/select2.min.css')}}">
@endsection
<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">
                <form class="row" action="{{route('admin.ppdb.ditolak')}}" method="GET">
                    <div class="col-md-4 col-sm-6 col-lg-2">
                        <label class="control-label">Start Date</label>
                        <input type="date" name="start_date" value="{{old('start_date')}}" class="form-control">
                    </div>
                    <div class="col-md-4 col-sm-6 col-lg-2">
                        <label class="control-label">End Date</label>
                        <input type="date" name="end_date" value="{{old('end_date')}}" class="form-control">
                    </div>
                    <div class="col-md-4 col-sm-6 col-lg-2">
                        <label class="control-label">Tahun Ajaran</label>
                        <select class="form-control select2" name="tahun">
                            <option value="">Pilih Tahun Ajaran</option>
                            @foreach($attribut['tahun'] as $tahun)
                            <option value="{{$tahun->id}}">{{$tahun->nama_tahunajaran}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 col-sm-6 col-lg-2">
                        <label class="control-label">Gelombang</label>
                        <select class="form-control select2" name="gelombang">
                            <option value="">Choose Gelombang</option>
                        </select>
                    </div>
                    <div class="col-md-4 col-sm-6 col-lg-3 ">
                        <label class="control-label">Urutan</label>
                        <div class="input-group mb-3">
                            <select class="form-control" name="order">
                                <option value="desc">Urutan Terbaru</option>
                                <option value="asc">Urutan Terlama</option>
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-striped table-hover" id="tablePenjualan" style="width:100%;">
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
                        {{$data->links()}}
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
<script src="{{my_asset('plugins/select2/dist/js/select2.full.min.js')}}"></script>
@endsection
@endsection