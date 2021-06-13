@extends('website.theme2.inc.app')
@section('content')


<!-- Hero section -->
<section class="hero-section">
    <div class="hero-slider owl-carousel">
        @foreach($slide as $hero)
        <div class="hs-item set-bg" data-setbg="{{my_asset($hero->image_slider)}}">
            <div class="hs-text">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="hs-subtitle">{{$hero->title_slider}}</div>
                            <h2 class="hs-title">{{$hero->subtitle_slider}}.</h2>
                            @if($hero->button_slider != null)
                            <a href="{{$hero->button_link}}" class="site-btn">{{$hero->button_slider}}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</section>
<!-- Hero section end -->



<!-- Services section -->
<section class="service-section spad">
    <div class="container services">
        <div class="section-title text-center">
            <h3>Keunggulan Sekolah</h3>
            <p>Berikut Beberapa Keunggulan Sekolah</p>
        </div>
        <div class="row">
            @foreach($feat as $feature)
            <div class="col-lg-4 col-sm-6 service-item">
                <div class="service-icon">
                    <img src="{{my_asset($feature->feature_icon)}}" alt="1">
                </div>
                <div class="service-content">
                    <h4>{{$feature->feature_title}}</h4>
                    <p>{{$feature->feature_description}}</p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- Services section end -->


<!-- Enroll section -->
<section class="enroll-section spad set-bg" data-setbg="{{my_asset($visi->image_mission)}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-title text-white">
                    <h3>Misi Sekolah</h3>
                </div>
                <div class="enroll-list text-white">
                    <div class="enroll-list-item">
                        <?= $visi->mission; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1 p-lg-0 p-4">
                <img src="{{my_asset($visi->image_mission)}}" style="border-radius: 10%;" alt="">
            </div>
        </div>
    </div>
</section>
<!-- Enroll section end -->


<!-- Courses section -->
<section class="courses-section spad">
    <div class="container">
        <div class="section-title text-center">
            <h3>Event Sekolah</h3>
        </div>
        <div class="row">
            <!-- course item -->
            @foreach($even as $event)
            <a href="/event/detail/<?= $event->id . '/' . strtolower(preg_replace("/[^a-zA-Z0-9]/", "-", $event->event_title)); ?>" class="col-lg-4 col-md-6 course-item">
                <div class="course-thumb">
                    <img src="{{my_asset($event->event_image)}}" style="width: 400px; height:250px" alt="">
                    <div class="course-cat">
                        <span>{{$event->category->cat_name}}</span>
                    </div>
                </div>
                <div class="course-info">
                    <h4>{{$event->event_title}}</h4>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
<!-- Courses section end-->



<!-- Enroll section -->
<section class="enroll-section spad set-bg" data-setbg="{{my_asset($visi->image_vission)}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-1 p-lg-0 p-4">
                <img src="{{my_asset($visi->image_vission)}}" style="border-radius: 10%;" alt="">
            </div>
            <div class="col-lg-5">
                <div class="section-title text-white">
                    <h3>Visi Sekolah</h3>
                </div>
                <div class="enroll-list text-white">
                    <div class="enroll-list-item text-left">
                        <?= $visi->vission; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Enroll section end -->


<!-- Team section  -->
@if($sett->teacher_appear == 1)
<section class="team-section spad">
    <div class="container">
        <div class="section-title text-center">
            <h3>Guru Sekolah</h3>
        </div>
        <div class="row">
            @foreach($guru as $teacher)
            <div class="col-md-6 col-lg-3 mb-3">
                <div class="member">
                    @if($teacher->teacher_image != null)
                    <div class="member-pic set-bg" data-setbg="{{my_asset($teacher->teacher_image)}}">
                        @else
                        <div class="member-pic set-bg" data-setbg="{{my_asset($teacher->employee->photo)}}">
                            @endif
                            <div class="member-social">
                                <a href="javascript:void(0)"><i class="fa fa-user-circle"></i> Detail</a>
                            </div>
                        </div>
                        <h5>{{$teacher->employee->first_name}} {{$teacher->employee->middle_name}} {{$teacher->employee->last_name}}</h5>
                        
                    </div>
                </div>
                @endforeach
            </div>
        </div>
</section>
@endif
<!-- Team section end -->


<!-- Gallery section -->
<div class="gallery-section">
    <div class="gallery">
        <div class="grid-sizer"></div>
        @foreach($gallery as $gall)
        <div class="gallery-item gi-big set-bg" data-setbg="{{my_asset($gall->image)}}">
            <a class="img-popup" href="{{my_asset($gall->image)}}"><i class="ti-plus"></i></a>
        </div>
        @endforeach
    </div>
</div>
<!-- Gallery section -->







@endsection