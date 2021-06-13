@extends('user.app_ppdb')
@section('content')
@section('style')
<link rel="stylesheet" href="{{my_asset('admin/users/vendors/quill/quill.snow.css')}}" />
@endsection
<?php

use App\MadingBoard;
?>
<!-- START: Card Data-->
<div class="row">
    <div class="col-12 col-lg-3 col-xl-2 mb-4 mt-3 pr-lg-0 flip-menu">
        <a href="#" class="d-inline-block d-lg-none mt-1 flip-menu-close"><i class="icon-close"></i></a>
        <div class="card border h-100 mail-menu-section">
            <div class="media d-block text-center  p-3">
                <a href="#" class="bg-primary w-100 d-block py-2 px-2 rounded text-white" data-toggle="modal" data-target="#addnote">
                    <i class="icon-plus align-middle text-white"></i> <span>Tambah Mading</span>
                </a>
            </div>
            <ul class="list-unstyled inbox-nav  mb-0 mt-2 notes-menu">
                <li class="nav-item"><a href="#" data-notetype="all" class="nav-link active"><i class="icon-envelope pr-2"></i> Semua Mading</a></li>
            </ul>
            <div class="eagle-divider"></div>
            <div class="card-header py-1 mt-4">
                <h6 class="mb-0">Kategori</h6>
            </div>
            <ul class="nav flex-column font-weight-bold mt-3 note-label" id="myTab1" role="tablist">
                <li class="nav-item  px-3">
                    <a class="nav-link text-primary" data-label="pendidikan" href="#">
                        <i class="icon-pin"></i> Pendidikan
                    </a>
                </li>
                <li class="nav-item  px-3">
                    <a class="nav-link text-danger" data-label="bisnis" href="#">
                        <i class="icon-pin"></i> Bisnis
                    </a>
                </li>
                <li class="nav-item  px-3">
                    <a class="nav-link text-warning" data-label="pengalaman" href="#">
                        <i class="icon-pin"></i> Experience
                    </a>
                </li>
                <li class="nav-item  px-3">
                    <a class="nav-link text-success" data-label="social" href="#">
                        <i class="icon-pin"></i> Social
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-12 col-lg-9 col-xl-10 mb-4 mt-3 pl-lg-0">
        <div class="card border  h-100 notes-list-section">
            <a href="#" class="d-inline-block d-lg-none flip-menu-toggle border-0"><i class="icon-menu"></i></a>
            <div class="row notes">
                @foreach($data as $mading)
                <div class="col-12  col-md-6 col-lg-4 my-3 note {{$mading->label}} all" data-type="{{$mading->label}}">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body p-4">
                                <h6 class="mb-3 font-w-600">{{$mading->title}}</h6>
                                @if($mading->posting->type_account == 'ppdb')
                                <p class="font-w-500 tx-s-12"><i class="icon-calendar"></i> <span class="note-date">{{date('Y-M-d')}} Ditambahkan oleh {{$mading->posting->first_name}}  {{$mading->posting->middle_name}} {{$mading->posting->last_name}} </span></p>
                                @else
                                <p class="font-w-500 tx-s-12"><i class="icon-calendar"></i> <span class="note-date">{{date('Y-M-d')}} Ditambahkan oleh {{$mading->posting->employee->first_name}} {{$mading->posting->employee->middle_name}} {{$mading->posting->employee->last_name}} </span></p>
                                @endif
                                <div class="note-content mb-4">{{$mading->description}} </div>
                                <div class="d-flex notes-tool">
                                    <span class="dot"></span>
                                    <div class="ml-auto">
                                        <?php
                                        $myHave = MadingBoard::where('user_id', Auth()->user()->id)->where('id', $mading->id)->first();
                                        ?>
                                        @if($myHave != null)
                                        <a class="text-success edit-note" href="#" data-toggle="modal" data-target="#editnote-{{$mading->id}}"><i class="icon-pencil"></i></a>
                                        <a class="text-danger delete-note" href="#" data-id="{{$mading->id}}"><i class="icon-trash"></i></a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{$data->links()}}
        </div>
    </div>
</div>

<div class="modal fade" id="addnote">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="icon-pencil"></i> Publish Mading
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="icon-close"></i>
                </button>
            </div>

            <form class="add-note-form" action="{{route('mading.insert_umum')}}" method="POST">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title" class="col-form-label">Judul</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-form-label">Isi</label>
                        <textarea class="form-control" rows="10" name="description" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="title" class="col-form-label">Kategori</label>
                        <select class="form-control" id="type" name="label">
                            <option value="pendidikan">Pendidikan</option>
                            <option value="bisnis">Bisnis</option>
                            <option value="pengalaman">Pengalaman</option>
                            <option value="social">Social</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary add-todo">Publish Mading</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach($data as $modal)
<div class="modal fade" id="editnote-{{$modal->id}}">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="icon-pencil"></i> Edit Note
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="icon-close"></i>
                </button>
            </div>

            <form class="edit-note-form" action="{{route('mading.update_umum')}}" method="POST">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title" class="col-form-label">Title</label>
                        <input type="text" class="form-control" name="title" value="{{$modal->title}}">
                        <input type="hidden" name="id" id="mading_id" value="{{encrypt($modal->id)}}">
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-form-label">Description</label>
                        <textarea class="form-control" rows="10" name="description">{{$modal->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Label</label>
                        <select class="form-control" id="edit-type">
                            <option value="pendidikan" selected>Pendidikan</option>
                            <option value="bisnis">Bisnis</option>
                            <option value="pengalaman">Pengalaman</option>
                            <option value="social">Social</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" class="note-date" />
                    <button type="submit" class="btn btn-primary add-todo">Edit Note</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@section('script')
<script src="{{my_asset('admin/users/vendors/quill/quill.min.js')}}"></script>
<script src="{{my_asset('admin/users/js/notes.script.js')}}"></script>
@endsection
@endsection