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
            <div class="card-header">
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target=".add-admin">
                    <i class="fa fa-plus"></i> Tambah Admin
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    No
                                </th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Email</th>
                                <th>Photo</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $dt)
                            <tr>
                                <td>
                                    #
                                </td>
                                <td>{{$dt->Employee->first_name}} {{$dt->Employee->middle_name}} {{$dt->Employee->last_name}}</td>
                                <td class="align-middle">
                                    @if($dt->Employee->jk == 'L')
                                    <p>Pria</p>
                                    @else
                                    <p>Wanita</p>
                                    @endif
                                </td>
                                <td>
                                    {{$dt->email}}
                                </td>
                                <td>
                                    <img alt="image" src="{{my_asset($dt->Employee->photo)}}" width="35">
                                </td>
                                <td>
                                    <div class="badge badge-success badge-shadow">
                                        @if($dt->role == 1)
                                        Administrator
                                        @elseif($dt->role == 2)
                                        Keuangan
                                        @elseif($dt->role == 3)
                                        Perpustakaan
                                        @elseif($dt->role == 4)
                                        Sekretaris
                                        @elseif($dt->role == 5)
                                        Kesiswaan
                                        @elseif($dt->role == 6)
                                        BK
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target=".update-user-{{$dt->id}}" class="btn btn-sm btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('user.admin.delete',$dt->id)}}" class="btn btn-sm btn-danger tombolhapus">
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
@include('backend.partials.admin')
@section('script')
<script src="{{my_asset('plugins/datatables/datatables.min.js')}}"></script>
<script src="{{my_asset('plugins/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- Page Specific JS File -->
<script src="{{my_asset('admin/theme/js/page/datatables.js')}}"></script>
@endsection
@endsection