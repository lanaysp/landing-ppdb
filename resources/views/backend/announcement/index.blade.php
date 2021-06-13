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
                        <a class="btn btn-sm btn-primary" href="{{route('admin.add_announcement')}}">
                            <i class="fas fa-plus"></i> Buat Pengumuman
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
                                <th style="width: 30%;">Judul</th>
                                <th>Image</th>
                                <th>Tanggal</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                            @foreach($data as $dt)
                            <tr>
                                <td>
                                    {{$dt->announcement_title}}
                                </td>
                                <td>
                                    <a href="#">
                                        <img alt="image" src="{{my_asset($dt->image)}}" class="rounded-circle" width="35" data-toggle="title" title="">
                                    </a>
                                </td>
                                <td> {{$dt->created_at}} </td>
                                <td>
                                    @if($dt->type_announcement == 1)
                                    UNTUK PPDB
                                    @endif
                                </td>
                              
                                <td>
                                    <a class="btn btn-sm btn-warning" href="{{route('admin.edit_announcement',[$dt->id,strtolower(preg_replace("/[^a-zA-Z0-9]/","-",$dt->announcement_title))])}}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn btn-sm btn-danger tombolhapus" href="{{route('admin.delete_announcement',[$dt->id,strtolower(preg_replace("/[^a-zA-Z0-9]/","-",$dt->announcement_title))])}}">
                                        <i class="fas fa-trash"></i>
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