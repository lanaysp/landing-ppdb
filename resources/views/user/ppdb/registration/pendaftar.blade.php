@extends('user.app_ppdb')
@section('content')
<div class="row row-eq-height">
    <div class="col-12 col-lg-2 mt-3 todo-menu-bar flip-menu pr-lg-0">
        <a href="#" class="d-inline-block d-lg-none mt-1 flip-menu-close"><i class="icon-close"></i></a>
        <div class="card border h-100 contact-menu-section">
            <div class="card-header d-flex justify-content-between align-items-center">

                <a href="{{route('ppdb.info.gelombang')}}" class="bg-primary py-2 px-2 rounded ml-auto text-white w-100 text-center">
                    <i class="icon-plus align-middle text-white"></i> <span class="d-none d-xl-inline-block">Gelombang</span>
                </a>

            </div>

            <ul class="nav flex-column contact-menu">
                <li class="nav-item">
                    <a class="nav-link active" href="#" data-contacttype="contact">
                        <i class="icon-list"></i> Semua
                    </a>
                </li>
                @php
                $no = 1;
                $tanda = 1;
                @endphp
                @foreach($data->sesidaftar as $gelombang)
                <li class="nav-item">
                    <a class="nav-link" href="#" data-contacttype="{{$gelombang->id}}">
                        <i class="icon-people"></i> Gelombang {{$no++}}
                    </a>
                </li>
                @endforeach
            </ul>

        </div>
    </div>
    <div class="col-12 col-lg-10 mt-3 pl-lg-0">
        <div class="card border h-100 contact-list-section">
            <div class="card-header border-bottom p-1 d-flex">
                <a href="#" class="d-inline-block d-lg-none flip-menu-toggle"><i class="icon-menu"></i></a>
                <input type="text" class="form-control border-0 p-2 w-100 h-100 contact-search" placeholder="Search ...">
                <a href="#" class="list-style search-bar-menu border-0 active"><i class="icon-list"></i></a>
                <a href="#" class="grid-style search-bar-menu"><i class="icon-grid"></i></a>
            </div>
            <div class="card-body p-0">

                <div class="contacts list">
                    
                    @foreach($data->sesidaftar as $gelombang)
                    @foreach($gelombang->pendaftar as $peserta)
                    <div class="contact {{$gelombang->id}}">
                        <div class="contact-content">
                            <div class="contact-profile">
                                <img src="{{my_asset($peserta->photo)}}" alt="avatar" class="user-image img-fluid">
                                <div class="contact-info">
                                    <p class="contact-name mb-0">{{$peserta->nama_lengkap}}</p>
                                    <p class="contact-position mb-0 small font-weight-bold text-muted">{{$gelombang->nama_gelombang}}</p>
                                </div>
                            </div>
                            <div class="contact-email">
                                <p class="mb-0 small">Gender: </p>
                                <p class="user-email">{{$peserta->jenis_kelamin}}</p>
                            </div>
                            <div class="contact-location">
                                <p class="user-location">{{$peserta->created_at}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endforeach
                </div>


            </div>
        </div>
    </div>
</div>
@section('script')
<script src="{{my_asset('admin/users/js/app.contactlist.js')}}"></script>
@endsection
@endsection