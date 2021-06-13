@extends('user.app_ppdb')
@section('content')
<div class="row">

    <div class="col-12 col-sm-12 mt-3">
        <div class="card">
            <div class="card-header  justify-content-between align-items-center">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <h4 class="card-title">
                            <button class="btn btn-sm btn-success content-left mb-0" data-toggle="modal" data-target="#add">
                                <i class="fa fa-plus"></i> Tambah Diskusi
                            </button>
                        </h4>
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <form action="{{route('ppdb.forum')}}" method="GET">
                            <div class="form-group mb-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Cari Tema Diskusi">
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php

    use App\Pengguna\Forum;
    ?>
    @foreach($data as $other)
    <div class="col-12 col-md-12 col-lg-12 mt-3">
        <div class="card border">
            <div class="card-content">
                <div class="card-body p-4">
                    <div class="d-md-flex">
                        <div class="my-auto">
                            <img src="{{my_asset('admin/users/images/info.png')}}" alt="author" width="48" class="my-auto">
                        </div>
                        <div class="content px-md-3 my-3 my-md-0">
                            <span class="mb-0 font-w-600 h5">{{$other->title}}</span><br>
                            <p class="mb-0 font-w-500 tx-s-12"><?= substr($other->description, 0, 150); ?></p>
                        </div>
                        <div class="my-auto">
                            <?php
                            $forum  = Forum::where('user_id', $other->user_id)->first();
                            ?>
                            @if($forum != null)
                            <a href="#" data-toggle="modal" data-target="#edit-{{$other->id}}" class="btn btn-outline-primary font-w-600 my-auto text-nowrap "><i class="fa fa-edit"></i></a>
                            @endif
                            <a href="{{route('ppdb.detail_forum',encrypt($other->id))}}" class="btn btn-outline-primary font-w-600 my-auto text-nowrap"><i class="fa fa-list"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="col-12 col-sm-12 mt-3">
        <div class="card">
            <div class="card-header  justify-content-between align-items-center">
                {{$data->links()}}
            </div>
        </div>
    </div>
</div>
@include('user.partials.forum')
@endsection