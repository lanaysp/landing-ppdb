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
                                <th>Subject Document</th>
                                <th>Tanda Tangan</th>
                                <th>Kategori</th>
                                <th>Template</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $reg)
                            <tr>
                                <td>{{$reg->title}} </td>
                                <td>{{$reg->tanda->employee->first_name}} {{$reg->tanda->employee->middle_name}} {{$reg->tanda->employee->last_name}} </td>
                                <td>{{$reg->category->name}} </td>
                                <td>{{$reg->template->template_name}}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{route('document.detail',encrypt($reg->id))}}" target="_blank">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-sm btn-warning text-white" href="{{route('document.update',$reg->id)}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-sm btn-danger text-white tombolhapus" href="{{route('document.delete',$reg->id)}}">
                                        <i class="fa fa-trash"></i>
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