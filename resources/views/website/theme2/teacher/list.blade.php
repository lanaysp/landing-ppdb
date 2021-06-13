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
                                        <li class="breadcrumb-item"><a href="#">{{$page}}</a></li>
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

    <section class="about-area1 fix pt-10" style="margin-top: 40px;">
        <div class="container">
            <div class="row">
                @foreach($data as $teacher)
                <div class="col-lg-3 col-md-6 mt-5 mb-5">
                    <div class="single-teachers">
                        <div class="teacherImg d-flex justify-content-center">
                            @if($teacher->teacher_image != null)
                            <img src="{{my_asset($teacher->teacher_image)}}" style="height: 259px; width:280px;" alt="{{$teacher->employee->first_name}} {{$teacher->employee->middle_name}} {{$teacher->employee->last_name}}" />
                            @else
                            <img src="{{my_asset($teacher->employee->photo)}}" style="height: 259px; width:280px;" alt="{{$teacher->employee->first_name}} {{$teacher->employee->middle_name}} {{$teacher->employee->last_name}}" />
                            @endif
                            <ul class="social-icons list-inline">
                                <!-- social-icons -->
                                @foreach($teacher->employee->sosmed as $sosmed)
                                <li class="social-facebook">
                                    <a href="{{$sosmed->link_url}}" target="_blank"><i class="fab fa-{{$sosmed->nama_sosmed}}" aria-hidden="true"></i></a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="teachers-content" style="height: 200px;">
                            <h3 class="mt-5">
                                <a href="{{route('web.teacher.detail',[$teacher->id,$teacher->employee->first_name])}}">
                                    {{$teacher->employee->first_name}} {{$teacher->employee->middle_name}} {{$teacher->employee->last_name}}
                                </a>
                            </h3>
                            <div class="designation">{{$teacher->employee->designation->designation_name}}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{$data->links()}}
            <br>
        </div>
    </section>
</main>
@endsection