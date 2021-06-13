@extends('user.app_ppdb')
@section('content')
@section('style')
<!-- START: Page CSS-->
<link rel="stylesheet" href="{{my_asset('admin/users/vendors/fullcalendar/core/main.min.css')}}">
<link rel="stylesheet" href="{{my_asset('admin/users/vendors/fullcalendar/daygrid/main.css')}}" />
<link rel="stylesheet" href="{{my_asset('admin/users/vendors/fullcalendar/timegrid/main.css')}}" />
<link rel="stylesheet" href="{{my_asset('admin/users/vendors/fullcalendar/list/main.css')}}" />
<!-- END: Page CSS-->
@endsection
<!-- START: Card Data-->
<div class="row">
    <div class="col-12 col-lg-12  mt-3">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3 mt-3">
                @foreach($forum as $frm)
                <div class="card border-bottom-0 mb-3 ">
                    <div class="card-content border-bottom border-primary border-w-5">
                        <a href="{{route('ppdb.detail_forum',encrypt($frm->id))}}" class="card-body p-4">
                            <div class="d-flex">
                                <img src="{{my_asset('admin/users/images/info.png')}}" alt="author" width="55" class="rounded-circle  ml-auto">
                                <div class="media-body align-self-center pl-3">
                                    <span class="mb-0 font-w-600">{{$frm->title}}</span><br>
                                    <p class="mb-0 font-w-500 tx-s-12">Dibuat Oleh : {{$frm->pengguna->first_name}} {{$frm->pengguna->middle_name}} {{$frm->pengguna->last_name}} </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-12 col-md-9 col-lg-9 mt-3">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <input type="hidden" id="tanggal_now" value="{{date('Y-m-d')}}">
                            <div id="calendar" class="height-500"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    @foreach($pengumuman as $other)
    <div class="col-12 col-md-6 col-lg-6 mt-3">
        <div class="card border">
            <div class="card-content">
                <div class="card-body p-4">
                    <div class="d-md-flex">
                        <div class="my-auto">
                            <img src="{{my_asset($other->image)}}" alt="author" width="48" class="my-auto">
                        </div>
                        <div class="content px-md-3 my-3 my-md-0">
                            <span class="mb-0 font-w-600 h5">{{$other->announcement_title}}</span><br>
                            <p class="mb-0 font-w-500 tx-s-12"><?= substr($other->description, 0, 150); ?></p>
                        </div>
                        <div class="my-auto">
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#detail-info-{{$other->id}}" class="btn btn-outline-primary font-w-600 my-auto text-nowrap">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach


    <!-- calendar modal start -->
    <div id="meeting-detail" class="modal fade" role="dialog">
        <div class="modal-dialog text-left">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card-content">
                        <div class="card-body p-4">
                            <div class="d-md-flex">
                                <div class="my-auto">
                                    <img id="gambar_meet" src="" alt="author" width="48" class="my-auto">
                                </div>
                                <div class="content px-md-3 my-3 my-md-0">
                                    <span class="mb-0 font-w-600 h5 meet-title" id="judul_meeting"></span><br>
                                    <p class="mb-0 font-w-500 tx-s-12" id="description"></p>
                                </div>
                                <div class="my-auto">
                                    <a href="" id="link" target="_blank" class="btn btn-outline-primary font-w-600 my-auto text-nowrap">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- End Calendar Modal -->

    <!-- Calendar Modal Pengumuman -->
    @foreach($pengumuman as $detail)
    <div class="modal fade" id="detail-info-{{$detail->id}}" tabindex="-1" role="dialog" aria-labelledby="detail-info-{{$detail->id}}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{$detail->announcement_title}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= $detail->description; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- End Kalendar Modal Pengumuman -->
</div>
@section('script')

<!-- START: Page Vendor JS-->
<script src="{{my_asset('admin/users/vendors/popper/popper.min.js')}}"></script>
<script src="{{my_asset('admin/users/vendors/tooltip/tooltip-min.js')}}"></script>

<script src="{{my_asset('admin/users/vendors/fullcalendar/core/main.min.js')}}"></script>
<script src="{{my_asset('admin/users/vendors/fullcalendar/interaction/main.js')}}"></script>
<script src="{{my_asset('admin/users/vendors/fullcalendar/daygrid/main.js')}}"></script>
<script src="{{my_asset('admin/users/vendors/fullcalendar/timegrid/main.js')}}"></script>
<script src="{{my_asset('admin/users/vendors/fullcalendar/list/main.js')}}"></script>
<script src="{{my_asset('admin/users/vendors/fullcalendar/bundle/moment.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<script src="{{my_asset('admin/users/js/calendar.script.js')}}"></script>
@endsection
@endsection