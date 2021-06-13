@extends('website.theme.inc.app')
@section('content')

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
                                <h1 data-animation="bounceIn" data-delay="0.2s">{{$data->page_name}} </h1>
                                <!-- breadcrumb Start-->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Page</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">{{$data->page_name}}</a></li>
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
    <!--? Blog Area Start -->
    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 posts-list">
                    <div class="single-post">
                        @if($data->image != null || $data->image == '')
                        <div class="feature-img">
                            <img class="img-fluid" src="{{my_asset($data->image)}}" alt="">
                        </div>
                        @endif
                        <div class="blog_details">
                            <h2 style="color: #2d2d2d;">{{($data->page_name)}}</h2>
                            <?= $data->content; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Area End -->
</main>
@endsection