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
                                <th>Subject Pesan</th>
                                <th>Alamat Tujuan</th>
                                <th>File Include </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $reg)
                            <tr>
                                <td>{{$reg->title}} </td>
                                <td>{{$reg->email}} </td>
                                <td>
                                    @if($reg->file != null)
                                    <a class="btn btn-sm btn-primary" href="{{my_asset($reg->file)}}" target="_blank">
                                        <i class="fa fa-download"></i>
                                    </a>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{route('mailing.detail',encrypt($reg->id))}}" target="_blank">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
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