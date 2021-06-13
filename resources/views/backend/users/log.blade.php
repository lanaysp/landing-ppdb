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
                <form class="row" action="{{route('admin.users.log')}}" method="GET">
                    <div class="col-md-4 col-sm-6 col-lg-3">
                        <label class="control-label">Start Date</label>
                        <input type="date" name="start_date" value="{{old('start_date')}}" class="form-control">
                    </div>
                    <div class="col-md-4 col-sm-6 col-lg-3">
                        <label class="control-label">End Date</label>
                        <input type="date" name="end_date" value="{{old('end_date')}}" class="form-control">
                    </div>
                    <div class="col-md-4 col-sm-6 col-lg-3">
                        <label class="control-label">Pengguna</label>
                        <select class="form-control select2" name="pengguna">
                            <option value="">Pilih Pengguna</option>
                            @foreach($user as $pengguna)
                            <option value="{{$pengguna->id}}">{{$pengguna->first_name}} {{$pengguna->middle_name}} {{$pengguna->last_name}} </option>
                            @endforeach
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
                                <th>Nama Pengguna</th>
                                <th>Tanggal & Waktu</th>
                                <th>Descripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $log)
                            <tr>
                                <td>{{$log->pengguna->first_name}} {{$log->pengguna->middle_name}} {{$log->pengguna->last_name}} </td>
                                <td>{{$log->created_at}} </td>
                                <td>{{$log->description}} </td>
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