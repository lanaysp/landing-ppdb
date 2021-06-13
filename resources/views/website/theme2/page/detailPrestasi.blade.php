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
                                <h1 data-animation="bounceIn" data-delay="0.2s">{{$page}} </h1>
                                <!-- breadcrumb Start-->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
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
    <!--? Blog Area Start -->
    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 posts-list">
                    <div class="single-post">
                        <div class="feature-img">
                            <img class="img-fluid" src="{{my_asset($data->archivement_photo)}}" alt="">
                        </div>
                        <div class="blog_details">
                            <h2 style="color: #2d2d2d;">{{($data->archivement_name)}}
                            </h2>
                            <ul class="blog-info-link mt-3 mb-4">
                                <li><a href="javascript:void(0)"><i class="fa fa-user"></i> {{$data->archivement_date}} </a></li>
                            </ul>
                            <?= $data->archivement_note; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Area End -->
</main>
@endsection