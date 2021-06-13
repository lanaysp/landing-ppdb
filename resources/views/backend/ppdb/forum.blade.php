@extends('backend.inc.app')
@section('content')
<div class="section-body">
    <div class="row">
        @foreach($data as $forum)
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <article class="article">
                <div class="article-header" style="background-color: black;">
                    <div class="article-title text-black">
                        <h2><a href="{{route('admin.ppdb.forum_detail',encrypt($forum->id))}}">{{$forum->title}}</a></h2>
                    </div>
                </div>
                <div class="article-details">
                    <p><?= substr($forum->description, 0, 100); ?> </p>
                    <div class="article-cta">
                        <a href="{{route('admin.ppdb.forum_detail',encrypt($forum->id))}}" class="btn btn-primary">Selengkapnya</a>
                        <a href="{{route('admin.ppdb.forum_delete',encrypt($forum->id))}}" class="btn btn-danger text-white tombolhapus">Delete</a>
                    </div>
                </div>
            </article>
        </div>
        @endforeach

    </div>

</div>
@endsection