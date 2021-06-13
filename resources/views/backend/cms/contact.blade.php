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
                    <div class="float-right">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="clearfix mb-3"></div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th style="width: 30%;">Nama</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                            @foreach($data as $dt)
                            <tr>
                                <td>
                                    {{$dt->contact_name}}
                                </td>
                                <td>
                                    <a href="#">{{$dt->contact_email}}</a>
                                </td>
                                <td>{{$dt->contact_phone}}</td>
                                <td>{{$dt->contact_address}}</td>
                                <td>
                                    <a class="btn btn-sm btn-danger tombolhapus" href="{{route('cms.update.page',['contactDelete',$dt->id])}}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a class="btn btn-sm btn-info" href="{{route('cms.update.page',['contactDetail',$dt->id])}}">
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