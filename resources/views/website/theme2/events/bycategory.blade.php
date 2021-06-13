@extends('website.theme.inc.app')
@section('content')
@if ($message = Session::get('flash'))
<div class="flash-data" data-flashdata="{{ $message }}"></div>
@endif

@if ($message = Session::get('gagal'))
<div class="gagal" data-gagal="{{ $message }}"></div>
@endif
<main>
    <!--? slider Area Start-->
    <section class="slider-area slider-area2">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-11 col-md-12">
                            <div class="hero__caption hero__caption2">
                                <h1 data-animation="bounceIn" data-delay="0.2s">{{$page}}</h1>
                                <!-- breadcrumb Start-->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">{{$page}}</a></li>
                                    </ol>
                                </nav>
                                <!-- breadcrumb End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--? Blog Area Start-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        @foreach($even as $event)
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="{{my_asset($event->event_image)}}" alt="">
                                <a href="{{route('event.detail',['detail',$event->id,strtolower(preg_replace("/[^a-zA-Z0-9]/", "-", $event->event_title))])}}" class="blog_item_date">
                                    <p>{{$event->start_date}} - {{$event->end_date}} </p>
                                </a>
                            </div>
                            <div class="blog_details">
                                <a class="d-inline-block" href="{{route('event.detail',['detail',$event->id,strtolower(preg_replace("/[^a-zA-Z0-9]/", "-", $event->event_title))])}}">
                                    <h2 class="blog-head" style="color: #2d2d2d;">{{$event->event_title}}</h2>
                                </a>
                                <ul class="blog-info-link">
                                    <li><a href="{{route('events.bycategory',['category',$event->category->id,strtolower(preg_replace("/[^a-zA-Z0-9]/", "-", $event->category->cat_name))])}}"><i class="fa fa-user"></i> {{$event->category->cat_name}}</a></li>
                                </ul>
                            </div>
                        </article>
                        @endforeach

                        {{$even->links()}}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="" method="GET">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="search" value="{{old('search')}}" placeholder='Cari Kegiatan' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Cari Kegiatan'">
                                        <div class="input-group-append">
                                            <button class="btns" type="submit"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Search</button>
                            </form>
                        </aside>
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title" style="color: #2d2d2d;">Category</h4>
                            <ul class="list cat-list">
                                @foreach($cate as $category)
                                <li>
                                    <a href="{{route('events.bycategory',['category',$category->id,strtolower(preg_replace("/[^a-zA-Z0-9]/", "-", $category->cat_name))])}}" class="d-flex">
                                        <p>{{$category->cat_name}}</p>
                                        <p>({{count($category->event)}})</p>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </aside>

                        <aside class="single_sidebar_widget newsletter_widget">
                            <h4 class="widget_title" style="color: #2d2d2d;">Subcribe</h4>
                            <div id="subcribe">
                                <div class="form-group">
                                    <input type="email" id="emailSub" class="form-control" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Email Anda'" placeholder='Masukkan Email Anda' required>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn sendSubcribe" type="submit">Subscribe</button>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Area End -->
</main>
@endsection