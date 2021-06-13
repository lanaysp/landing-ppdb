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
                <a class="btn btn-sm btn-primary" href="{{route('teacher.add')}}">
                    <i class="fa fa-plus"></i> Tambah Guru
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Photo</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $dt)
                            <tr>
                                <td>{{$dt->employee->first_name}} {{$dt->employee->middle_name}} {{$dt->employee->last_name}}</td>
                                <td>
                                    @if($dt->teacher_image != null)
                                    <img src="{{my_asset($dt->teacher_image)}}" style="max-width: 60px;">
                                    @else
                                    <img src="{{my_asset($dt->employee->photo)}}" style="max-width: 60px;">
                                    @endif
                                </td>
                                <td>{{$dt->email}}</td>
                                <td>
                                    @if($dt->teacher_mode == 1)
                                        Honorer
                                    @else 
                                        PNS
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('teacher.update',$dt->id)}}" class="btn btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('teacher.delete',$dt->id)}}" class="btn btn-danger tombolhapus">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <!-- <a href="{{route('employee.detail',[$dt->id,strtolower(preg_replace("/[^a-zA-Z0-9]/", "-", $dt->first_name))])}}" class="btn btn-primary">
                                        <i class="fa fa-eye"></i>
                                    </a> -->
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