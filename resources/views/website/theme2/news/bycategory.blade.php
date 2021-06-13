@extends('website.theme2.inc.app')
@section('content')
<!-- Breadcrumb section -->
<div class="site-breadcrumb">
    <div class="container">
        <a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
        <span>Berita Sekolah</span>
    </div>
</div>
<!-- Breadcrumb section end -->


<!-- Blog page section  -->
<section class="blog-page-section spad pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 post-list">
                @foreach($news as $new)
                <div class="post-item">
                    <div class="post-thumb set-bg" data-setbg="{{my_asset($new->thumbnail)}}"></div>
                    <div class="post-content">
                        <h3><a href="{{route('news.detail',['detail',$new->id,strtolower(preg_replace("/[^a-zA-Z0-9]/", "-", $new->news_title))])}}">{{$new->news_title}}</a></h3>
                        <div class="post-meta">
                            <span><i class="fa fa-comment"></i> {{count($new->comment)}} Komentar</span>
                            <span><i class="fa fa-th"></i> {{$new->catnews->cat_name}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
               {{$news->links()}}
            </div>
            <!-- sidebar -->
            @include('website.theme2.inc.sidebar')
        </div>
    </div>
</section>
<!-- Blog page section end -->
@endsection