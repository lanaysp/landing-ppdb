@extends('backend.inc.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$page}}</h4>
                    <button class="btn btn-sm btn-primary float-lg-right" data-toggle="modal" data-target="#add">
                        <i class="fa fa-plus"></i> Tambah Kategori
                    </button>
                    <br>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nama Kategori </th>
                                <th> Jumlah Berita </th>
                                <th> Icon Image </th>
                                <th> Status</th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($data as $dt)
                            <tr>
                                <td> {{$no++}} </td>
                                <td> {{$dt->cat_name}} </td>
                                <td>
                                    {{count($dt->news)}}
                                </td>

                                <td> <img src="{{my_asset($dt->cat_icon)}}" style="width: 100px;"> </td>
                                <td>
                                    @if($dt->cat_status == 1)
                                    Active
                                    @else
                                    Non Active
                                    @endif
                                </td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#update{{$dt->id}}" class="btn btn-sm btn-warning text-white">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('cms.page',['catdel',$dt->id])}}" class="btn btn-sm btn-danger text-white tombolhapus">
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
@include('backend.modal.catnews')
@endsection