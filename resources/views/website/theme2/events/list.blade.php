@extends('website.theme2.inc.app')
@section('content')

<!-- Breadcrumb section -->
<div class="site-breadcrumb">
    <div class="container">
        <a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
        <span>Kegiatan Sekolah</span>
    </div>
</div>
<!-- Breadcrumb section end -->


<!-- Courses section -->
<section class="full-courses-section spad pt-0">
    <div class="container">
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
                    <div class="date"><i class="fa fa-clock-o"></i> {{$event->start_date}} - {{$event->end_date}}</div>
                    <h4>{{$event->event_title}}</h4>
                </div>
            </a>
            @endforeach

        </div>


        <div class="text-center">
            {{$even->links()}}
        </div>
    </div>
</section>
<!-- Courses section end-->
@endsection