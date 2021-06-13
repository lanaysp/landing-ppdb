@extends('backend.inc.app')
@section('content')
@section('style')
<link rel="stylesheet" href="{{my_asset('plugins/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{my_asset('plugins/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
@endsection
<div class="section-body">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Tanggal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $dt)
                                <tr>
                                    <td>
                                        {{$dt->email}}
                                    </td>
                                    <td>
                                        {{$dt->created_at}}
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-danger tombolhapus text-white" href="{{route('cms.update.page',['deleteSubcriber',encrypt($dt->id)])}}">
                                            <i class="fas fa-trash"></i> Hapus
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
@section('script')
<script src="{{my_asset('plugins/datatables/datatables.min.js')}}"></script>
<script src="{{my_asset('plugins/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{my_asset('plugins/datatables/export-tables/dataTables.buttons.min.js')}}"></script>
<script src="{{my_asset('plugins/datatables/export-tables/buttons.flash.min.js')}}"></script>
<script src="{{my_asset('plugins/datatables/export-tables/jszip.min.js')}}"></script>
<script src="{{my_asset('plugins/datatables/export-tables/pdfmake.min.js')}}"></script>
<script src="{{my_asset('plugins/datatables/export-tables/vfs_fonts.js')}}"></script>
<script src="{{my_asset('plugins/datatables/export-tables/buttons.print.min.js')}}"></script>
<script src="{{my_asset('admin/theme/js/page/datatables.js')}}"></script>
@endsection
@endsection