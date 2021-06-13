@extends('backend.inc.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>{{$page}}</h4>
                <div class="card-header-action">
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target=".add-designation">
                        <i class="fa fa-plus"></i> Tambah Designation
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
                                <th>Nama Designation</th>
                                <th>Nama Department</th>
                                <th>Jumlah Staff / Karyawan</th>
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
                                <td>{{$dt->designation_name}}</td>
                                <td>{{$dt->Department->department_name}}</td>
                                <td>
                                    {{count($dt->Employee)}}
                                </td>
                                <td>
                                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target=".edit-designation-{{$dt->id}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('designation.delete',$dt->id)}}" class="btn btn-danger tombolhapus">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <a href="{{route('employee.designation',$dt->id)}}" class="btn btn-info">
                                        <i class="fa fa-arrow-circle-right"></i>
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
@include('backend.partials.designation')
@section('script')
<script src="{{my_asset('admin/theme/js/page/advance-table.js')}}"></script>
@endsection
@endsection