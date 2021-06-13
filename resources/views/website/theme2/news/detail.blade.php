@extends('website.theme2.inc.app')
@section('content')

<!-- Breadcrumb section -->
<div class="site-breadcrumb">
    <div class="container">
        <a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
        <span>{{$news->news_title}}</span>
    </div>
</div>
<!-- Breadcrumb section end -->


<!-- Blog page section  -->
<section class="blog-page-section spad pt-0">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="post-item post-details">
                    <img src="{{my_asset($news->thumbnail)}}" class="post-thumb-full" alt="">
                    <div class="post-content">
                        <h3><a href="javascript:void(0)">{{$news->news_title}}</a></h3>
                        <div class="post-meta">
                            <span><i class="fa fa-comment"></i> {{count($news->comment)}} Komentar</span>
                            <span><i class="fa fa-calendar"></i> {{$news->news_date}}</span>
                        </div>
                        <?= $news->news_description; ?>
                    </div>
                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                        <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                        <a class="a2a_button_facebook"></a>
                        <a class="a2a_button_twitter"></a>
                        <a class="a2a_button_whatsapp"></a>
                        <a class="a2a_button_telegram"></a>
                        <a class="a2a_button_print"></a>
                        <a class="a2a_button_line"></a>
                    </div>
                    <script async src="https://static.addtoany.com/menu/page.js"></script>
                    <div class="post-author">
                        <div class="pa-thumb set-bg" data-setbg="{{my_asset($news->author->photo)}}"></div>
                        <div class="pa-content">
                            <h4>Written by {{$news->author->first_name}} {{$news->author->last_name}} </h4>
                        </div>
                    </div>
                    <div class="comment-warp" id="berita" data-berita="{{$news->id}}">
                        <h4 class="comment-title" id="counterComment">( {{count($news->comment)}} ) Komentar</h4>
                        <ul class="comment-list" id="commentList">
                            @foreach($news->comment as $komentar)
                            <li>
                                <div class="comment">
                                    <div class="comment-avator set-bg" data-setbg="{{my_asset($komentar->user->image)}}"></div>
                                    <div class="comment-content">
                                        <span class="c-date">{{$komentar->created_at}}</span>
                                        <h5>{{$komentar->user->first_name}} {{$komentar->user->last_name}} </h5>
                                        <p>{{$komentar->comment_description}}</p>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <div class="comment-form-warp">
                            <h4 class="comment-title">Tinggalkan Komentar</h4>

                            <div class="comment-form comment_form" id="commentForm">
                                @if(Auth()->user())
                                <div class="row">
                                    <div class="col-sm-12">
                                        <textarea id="isiComment" placeholder="Tulis Komentar Anda"></textarea>
                                        <button class="site-btn sendComment">Kirim Komentar</button>
                                    </div>
                                </div>
                                @else
                                <div class="form-group">
                                    <p align="center">
                                        <a href="javascript:void(0)" class="site-btn" id="">Log - in Untuk Mulai Berkomentar</a>
                                    </p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- sidebar -->
            @include('website.theme2.inc.sidebar')
        </div>
    </div>
</section>
<!-- Blog page section end -->

@endsection