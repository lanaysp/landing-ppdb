@extends('website.theme2.inc.app')
@section('content')

<!-- Breadcrumb section -->
<div class="site-breadcrumb">
    <div class="container">
        <a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
        <span>{{$page}}</span>
    </div>
</div>
<!-- Breadcrumb section end -->


<!-- About section -->
<section class="about-section spad pt-0">
    <div class="container">
        <div class="section-title text-center">
            <h3>Selamat Datang Di {{$sett->school_name}} </h3>
        </div>
        <div class="row">
            <div class="col-lg-6 about-text">
                <h5>Tentang Sekolah</h5>
                <?= $visi->about; ?>
            </div>
            <div class="col-lg-6 pt-5 pt-lg-0">
                <img src="{{my_asset($visi->image_about)}}" style="border-radius: 10%;" alt="">
            </div>
        </div>
    </div>
</section>
<!-- About section end-->

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
@if($sett->subject_appear == 1)
<!-- Courses section -->
<section class="courses-section spad">
    <div class="container">
        <div class="section-title text-center">
            <h3>Mapel Sekolah</h3>
        </div>
        <div class="row">
            <!-- course item -->
            @foreach($mapel as $subject)
            <a href="javascript:void(0)" class="col-lg-4 col-md-6 course-item">
                <div class="course-thumb">
                    <img src="{{my_asset($subject->mapel_image)}}" style="width: 400px; height:250px" alt="">
                    <div class="course-cat">
                        <span>{{$subject->mapel_name}}</span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
<!-- Courses section end-->
@endif

<!-- Enroll section -->
<section class="enroll-section spad set-bg mb-5" data-setbg="{{my_asset($visi->image_vission)}}">
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


<!-- About section -->
<section class="about-section spad pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 about-text">
                <h5>Slogan Sekolah</h5>
                <?= $visi->slogan; ?>
            </div>
            <div class="col-lg-6 pt-5 pt-lg-0">
                <img src="{{my_asset($visi->image_slogan)}}" style="border-radius: 10%;" alt="">
            </div>
        </div>
    </div>
</section>
<!-- About section end-->

@endsection