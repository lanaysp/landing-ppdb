@extends('backend.inc.app')
@section('content')
<div class="section-body">
    <div class="news" data-news="{{$data->id}}"></div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Analytic Viewer Website</h4>
                </div>
                <div class="card-body">
                    <div class="recent-report__chart">
                        <div id="visitor"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-6">
            <div class="card">
                <div class="card-header">
                    <h4>Komentar Masuk</h4>
                </div>
                <div class="card-body">
                    <div class="recent-report__chart">
                        <div id="komentars"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-6">
            <div class="card">
                <div class="card-header">
                    <h4>Viewer Berdasarkan Gadget</h4>
                </div>
                <div class="card-body">
                    <div class="recent-report__chart">
                        <div id="perangkat"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix mb-3"></div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th style="width: 30%;">Nama Pengguna</th>
                                <th>Isi Komentar</th>
                                <th>Tanggal</th>
                                <th>Action</th>
                            </tr>
                            @foreach($comment as $dt)
                            <tr>
                                <td>
                                    {{$dt->user->first_name}} {{$dt->user->middle_name}} {{$dt->user->last_name}}
                                </td>
                                <td>{{$dt->comment_description}}</td>
                                <td>{{$dt->created_at}}</td>
                                <td>
                                    <a class="btn btn-sm btn-danger tombolhapus" href="{{route('cms.page',['deleteComment',$dt->id])}}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="float-right">
                        {{$comment->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
<script src="{{my_asset('plugins/apexcharts/apexcharts.min.js')}}"></script>
<!-- Page Specific JS File -->
<script src="{{my_asset('js/backend.js')}}"></script>
@endsection
@endsection