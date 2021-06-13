@extends('backend.inc.app')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-sm-12 col-lg-12">

            <div class="card author-box card-primary">
                <div class="card-body">
                    <div class="author-box-left">
                        <img alt="image" src="{{my_asset($data->pengguna->image)}}" class="rounded-circle author-box-picture">
                        <div class="clearfix"></div>
                        <a href="{{route('user.ppdb.detail',encrypt($data->pengguna->id))}}" class="btn btn-primary mt-3 follow-btn">Detail</a>
                    </div>
                    <div class="author-box-details">
                        <div class="author-box-name">
                            <a href="#">{{$data->pengguna->first_name}} {{$data->pengguna->mmiddle_name}} {{$data->pengguna->last_name}} </a>
                        </div>
                        @if($data->pengguna->role == '1')
                        <div class="author-box-job">Wali Murid</div>
                        @elseif($data->pengguna->role == '2')
                        <div class="author-box-job">Siswa</div>
                        @endif

                        <div class="author-box-description">
                            <h4>{{$data->title}} </h4>
                            <p>{{$data->description}}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Komentar</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                        @foreach($data->komentar as $komentar)
                        <li class="media">
                            @if($komentar->pengguna->type_account == 'ppdb')
                            <img alt="image" class="mr-3 rounded-circle" width="70" src="{{my_asset($komentar->pengguna->image)}}">
                            @else
                            <img alt="image" class="mr-3 rounded-circle" width="70" src="{{my_asset($komentar->pengguna->employee->photo)}}">
                            @endif
                            <div class="media-body">
                                @if($komentar->pengguna->type_account == 'ppdb')
                                <div class="media-title mb-1">{{$komentar->pengguna->first_name}} {{$komentar->pengguna->middle_name}} {{$komentar->pengguna->last_name}}</div>
                                @else
                                <div class="media-title mb-1">{{$komentar->pengguna->employee->first_name}} {{$komentar->pengguna->employee->middle_name}} {{$komentar->pengguna->employee->last_name}}</div>
                                @endif
                                <div class="text-time">{{$komentar->created_at}}</div>
                                <div class="media-description text-muted">{{$komentar->description}}</div>
                                <div class="media-links">
                                    <div class="bullet"></div>
                                    <a href="{{route('admin.forum.delete_reply',encrypt($komentar->id))}}" class="text-danger tombolhapus">Delete Komentar ini</a>
                                </div>
                            </div>
                        </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <form action="{{route('admin.forum.reply')}}" method="POST" class="card">
                {{csrf_field()}}
                <div class="card-header">
                    <h4>Komentari Forum ini</h4>
                </div>
                <div class="card-body pb-0">

                    <div class="form-group">
                        <label>Isi Komentar</label>
                        <input type="hidden" name="forum_id" value="{{$data->id}}">
                        <textarea class="form-control" name="description" required></textarea>
                    </div>
                </div>
                <div class="card-footer pt-0">
                    <button class="btn btn-primary">Kirim Komentar</button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection