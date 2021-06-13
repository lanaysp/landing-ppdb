@extends('user.app_ppdb')
@section('content')
@section('style')
<link rel="stylesheet" href="{{my_asset('admin/users/vendors/datatable/css/dataTables.bootstrap4.min.css')}}" />
<link rel="stylesheet" href="{{my_asset('admin/users/vendors/datatable/buttons/css/buttons.bootstrap4.min.css')}}" />
@endsection
<div class="row">
    <div class="col-12 mt-3">
        <div class="card">
            <div class="card-header">
                <a href="{{route('ppdb.notif.mark')}}" class="btn btn-sm btn-primary">
                    Tandai Semua Sebagai Telah Dibaca
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display table dataTable table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $log)
                            <tr>
                                <td>{{$log->description}}</td>
                                <td>{{$log->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Description</th>
                                <th>Date</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@section('script')
<!-- START: Page Vendor JS-->
<script src="{{my_asset('admin/users/vendors/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{my_asset('admin/users/vendors/datatable/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{my_asset('admin/users/vendors/datatable/jszip/jszip.min.js')}}"></script>
<script src="{{my_asset('admin/users/vendors/datatable/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{my_asset('admin/users/vendors/datatable/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{my_asset('admin/users/vendors/datatable/buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{my_asset('admin/users/vendors/datatable/buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{my_asset('admin/users/vendors/datatable/buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{my_asset('admin/users/vendors/datatable/buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{my_asset('admin/users/vendors/datatable/buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{my_asset('admin/users/vendors/datatable/buttons/js/buttons.print.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- START: Page Script JS-->
<script src="{{my_asset('admin/users/js/datatable.script.js')}}"></script>
@endsection
@endsection