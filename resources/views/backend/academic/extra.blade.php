@extends('backend.inc.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>{{$page}}</h4>
                <div class="card-header-action">
                    <a class="btn btn-sm btn-primary" href="{{route('add.extra')}}">
                        <i class="fa fa-plus"></i> Tambah Extra
                    </a>
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
                                <th>Nama Extrakulikuler</th>
                                <th>Guru Penanggung Jawab</th>
                                <th>Image </th>
                                <th>Gallery Kegiatan</th>
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
                                <td>{{$dt->extra_name}}</td>
                                <td>{{$dt->teacher->employee->username}}</td>
                                <td>
                                    <img src="{{my_asset($dt->extra_image)}}" width="80px" >
                                </td>
                                <td></td>
                                <td>
                                    <a href="{{route('update.extra',$dt->id)}}" class="btn btn-info">
                                        <i class="fa fa-image"></i>
                                    </a>
                                    <a href="{{route('update.extra',$dt->id)}}" class="btn btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('delete.extra',$dt->id)}}" class="btn btn-danger tombolhapus">
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
@section('script')
<script src="{{my_asset('admin/theme/js/page/advance-table.js')}}"></script>
@endsection
@endsection