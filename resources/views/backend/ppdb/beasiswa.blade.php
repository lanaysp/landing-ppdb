@extends('backend.inc.app')
@section('content')
@section('style')
<link rel="stylesheet" href="{{my_asset('plugins/jquery-selectric/selectric.css')}}">
@endsection
<div class="section-body">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="float-left">
                        <a class="btn btn-sm btn-primary" href="{{route('admin.add_beasiswa')}}">
                            <i class="fas fa-plus"></i> Tambah Beasiswa
                        </a>
                    </div>
                    <div class="float-right">
                        <form action="" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="clearfix mb-3"></div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th style="width: 30%;">Nama Beasiswa</th>
                                <th>Image</th>
                                <th>Limit</th>
                                <th>Tahun Ajaran</th>
                                <th>Status</th>
                                <th>Pendaftar</th>
                                <th>Action</th>
                            </tr>
                            @foreach($data as $dt)
                            <tr>
                                <td>
                                    {{$dt->title}}
                                </td>
                                <td>
                                    <a href="#">
                                        <img alt="image" src="{{my_asset($dt->image)}}" class="rounded-circle" width="35" data-toggle="title" title="">
                                    </a>
                                </td>
                                <td>
                                    <a href="#">{{number_format($dt->limit)}}</a>
                                </td>
                                <td>{{$dt->tahun->tahun_ajaran}}</td>
                                <td><?= $dt->status == 1 ? 'Aktif' : 'Tidak Aktif'; ?></td>
                                <td>{{count($dt->pendaftar)}}</td>
                                <td>
                                    <a class="btn btn-sm btn-warning" href="{{route('admin.update_beasiswa',[$dt->id,strtolower(preg_replace("/[^a-zA-Z0-9]/","-",$dt->title))])}}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @if($dt->status == 1)
                                    <a class="btn btn-sm btn-danger" href="{{route('admin.beasiswa.activasi',$dt->id)}}">
                                        <i class="fas fa-times"></i>
                                    </a>
                                    @else
                                    <a class="btn btn-sm btn-primary" href="{{route('admin.beasiswa.activasi',$dt->id)}}">
                                        <i class="fas fa-check"></i>
                                    </a>
                                    @endif
                                    <a class="btn btn-sm btn-info" href="#">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="float-right">
                        {{$data->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@section('script')
<script src="{{my_asset('plugins/jquery-selectric/jquery.selectric.min.js')}}"></script>
<script src="{{my_asset('admin/theme/js/page/posts.js')}}"></script>
@endsection
@endsection