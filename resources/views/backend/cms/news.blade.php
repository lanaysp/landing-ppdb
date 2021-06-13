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
                        <a class="btn btn-sm btn-primary" href="{{route('cms',['addNews'])}}">
                            <i class="fas fa-plus"></i> Tambah Berita
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
                                <th style="width: 30%;">Title</th>
                                <th>Image</th>
                                <th>Kategori</th>
                                <th>View</th>
                                <th>Tanggal</th>
                                <th>Komentar</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @foreach($data as $dt)
                            <tr>
                                <td>
                                    {{$dt->news_title}}
                                </td>
                                <td>
                                    <a href="#">
                                        <img alt="image" src="{{my_asset($dt->thumbnail)}}" class="rounded-circle" width="35" data-toggle="title" title="">
                                    </a>
                                </td>
                                <td>
                                    <a href="#">{{$dt->catnews->cat_name}}</a>
                                </td>
                                <td>{{count($dt->visitor)}}</td>
                                <td>{{$dt->news_date}}</td>
                                <td>{{count($dt->comment)}}</td>
                                <td>
                                    @if($dt->news_status == 1)
                                    <div class="badge badge-success">Active</div>
                                    @else
                                    <div class="badge badge-warning">Pending</div>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-warning" href="{{route('cms.update.page',['updateNews',$dt->id,strtolower(preg_replace("/[^a-zA-Z0-9]/","-",$dt->news_title))])}}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn btn-sm btn-danger tombolhapus" href="{{route('cms.page',['deleteNews',$dt->id])}}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a class="btn btn-sm btn-info" href="{{route('cms.update.page',['detailNews',$dt->id])}}">
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