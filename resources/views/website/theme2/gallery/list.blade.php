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


    <!--? Start Align Area -->
    <div class="whole-wrap">
        <div class="container box_1170">


            <div class="section-top-border">
                <h3>Gallery Sekolah</h3>
                <div class="row gallery-item">
                    @foreach($gallery as $gall)
                    <div class="col-md-4">
                        <a href="{{my_asset($gall->image)}}" class="img-pop-up">
                            <div class="single-gallery-image" style="background: url(<?=my_asset($gall->image);?>);"></div>
                        </a>
                    </div>
                    @endforeach
                </div>
                {{$gallery->links()}}
            </div>

        </div>
    </div>
    <!-- End Align Area -->
</main>
@endsection