@extends('backend.inc.app')
@section('content')
@section('style')
<link rel="stylesheet" href="{{my_asset('plugins/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{my_asset('plugins/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
<link href="{{my_asset('plugins/datatable/datatables.min.css')}}" rel="stylesheet">
@endsection
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    No
                                </th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Tanggal Daftar</th>
                                <th>Photo </th>
                                <th>Role </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $dt)
                            <tr>
                                <td>
                                    #
                                </td>
                                <td>{{$dt->first_name}} {{$dt->middle_name}} {{$dt->last_name}}</td>
                                <td>{{$dt->email}} </td>
                                <td>
                                    {{$dt->phone}}
                                </td>
                                <td>
                                    {{$dt->created_at}}
                                </td>
                                <td>
                                    @if($dt->role == '1')
                                    Wali Murid
                                    @else
                                    Murid
                                    @endif
                                </td>
                                <td>
                                    <img alt="image" src="{{my_asset($dt->image)}}" width="35">
                                </td>
                                <td>
                                    <a href="{{route('user.ppdb.detail',encrypt($dt->id))}}"  class="btn btn-sm btn-info text-white">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{route('user.admin.delete',$dt->id)}}" class="text-white btn btn-sm btn-danger tombolhapus">
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
</section>
@section('script')
<script src="{{my_asset('plugins/datatables/datatables.min.js')}}"></script>
<script src="{{my_asset('plugins/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- Page Specific JS File -->
<script src="{{my_asset('admin/theme/js/page/datatables.js')}}"></script>
@endsection
@endsection