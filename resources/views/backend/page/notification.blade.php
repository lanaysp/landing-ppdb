@extends('backend.inc.app')
@section('content')
@section('style')
<link rel="stylesheet" href="{{my_asset('plugins/datatables/datatables.min.css')}}">
@endsection
<div class="row">
    <div class="col-12">


        <div class="card">
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Type Pemberitahuan</th>
                                <th>Detail</th>
                                <th>Tanggal & Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $reg)
                            <tr>
                                <td>{{$reg->type}} </td>
                                <td>{{$reg->description}} </td>
                                <td>{{$reg->created_at}} </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="float-right">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
@section('script')
<script src="{{my_asset('plugins/datatables/datatables.min.js')}}"></script>
<script src="{{my_asset('admin/theme/js/page/datatables.js')}}"></script>
@endsection
@endsection