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

    <div class="courses-area section-padding40 fix">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-tittle text-center mb-55">
                        <h2>Extrakulikuler Sekolah</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach($data as $extra)
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="properties pb-20">
                        <div class="properties__card">
                            <div class="properties__img overlay1">
                                <a href="javascript:void(0)"><img width="509px" height="266px" src="{{my_asset($extra->extra_image)}}" alt=""></a>
                            </div>
                            <div class="properties__caption">
                                <p>Pembimbing :<b> {{$extra->teacher->employee->first_name}} {{$extra->teacher->employee->middle_name}} {{$extra->teacher->employee->last_name}}</b></p>
                                <h3><a href="{{route('web.detail.extra',[$extra->id,strtolower(preg_replace("/[^a-zA-Z0-9]/", "-", $extra->extra_name))])}}">{{$extra->extra_name}}</a></h3>
                                <p><?= substr($extra->extra_note, 0, 200); ?></p>
                                <a href="{{route('web.detail.extra',[$extra->id,strtolower(preg_replace("/[^a-zA-Z0-9]/", "-", $extra->extra_name))])}}" class="border-btn border-btn2">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


</main>
@endsection