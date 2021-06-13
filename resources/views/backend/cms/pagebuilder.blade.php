@extends('backend.inc.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-sm btn-primary float-lg-right" href="{{route('cms',['addPage'])}}">
                        <i class="fa fa-plus"></i> Tambah Page
                    </a>
                    <br>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Page Name </th>
                                <th> Status </th>
                                <th> Image </th>
                                <th>Posisi</th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $dt)
                            <tr>
                                <td> # </td>
                                <td> {{$dt->page_name}} </td>
                                <td>
                                    @if($dt->page_status == 1)
                                    Aktif
                                    @else
                                    Tidak Aktif
                                    @endif
                                </td>
                                <td>
                                    <img src="{{my_asset($dt->image)}}" width="80px" alt="">
                                </td>
                                <td>
                                    @if($dt->position == 1)
                                    Menu Atas
                                    @elseif($dt->position == 2)
                                    Info Sekolah ( Footer)
                                    @elseif($dt->position == 3)
                                    Info Umum (Footer)
                                    @elseif($dt->position == 4)
                                    Lainnya (Footer)
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('cms.update.page',['updatePage',$dt->id])}}" class="btn btn-sm btn-warning text-white">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('cms.update.page',['delete-page',$dt->id])}}" class="btn btn-sm btn-danger text-white tombolhapus">
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
@endsection