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

    @php
    $no = 1;
    @endphp
    @foreach($data as $fasilitas)
    @php
    $position = $no++;
    @endphp
    @if($position % 2 == 0)
    <section class="about-area1 fix pt-10 mt-5 mb-5">
        <div class="support-wrapper align-items-center">
            <div class="left-content1">
                <div class="about-icon">
                    <img src="/website/theme/assets/img/icon/about.svg" alt="">
                </div>
                <!-- section tittle -->
                <div class="section-tittle section-tittle2 mb-55">
                    <div class="front-text">
                        <h2 class="">{{$fasilitas->facility_name}} </h2>
                        <p>{{$fasilitas->deskripsi}} </p>
                    </div>
                </div>
            </div>
            <div class="right-content1">
                <!-- img -->
                <div class="right-img">
                    <img src="{{my_asset($fasilitas->facility_image)}}" alt="">
                </div>
            </div>
        </div>
    </section>
    @else
    <section class="about-area3 fix mt-5 mb-5">
        <div class="support-wrapper align-items-center">
            <div class="right-content3">
                <!-- img -->
                <div class="right-img">
                    <img src="{{my_asset($fasilitas->facility_image)}}" alt="">
                </div>
            </div>
            <div class="left-content3">
                <!-- section tittle -->
                <div class="section-tittle section-tittle2 mb-20">
                    <div class="front-text">
                        <h2 class="">{{$fasilitas->facility_name}}</h2>
                    </div>
                </div>

                <div class="single-features">
                    <p>{{$fasilitas->deskripsi}} </p>
                </div>
            </div>
        </div>
    </section>
    @endif
    @endforeach


</main>
@endsection