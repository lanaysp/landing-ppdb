@extends('website.theme.inc.app')
@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs testimonials" id="testimonials" data-aos="fade-in">
      <div class="container">
        <h2>{{$page}}</h2>
       <p>
        <i class="bx bx-home"></i>
        <a href="/" class="text-white">Home</a> |
        <a href="javascript:void(0)" class="text-white">{{$page}}</a>
       </p>

      </div>
    </div><!-- End Breadcrumbs -->

   <!-- ======= Trainers Section ======= -->
    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">

        @foreach($data as $teacher)
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member">
            @if($teacher->teacher_image != null)
             <img src="{{my_asset($teacher->teacher_image)}}" style="height: 259px; width:280px;" alt="{{$teacher->employee->first_name}} {{$teacher->employee->middle_name}} {{$teacher->employee->last_name}}">
            @else
             <img src="{{my_asset($teacher->employee->photo)}}" style="height: 259px; width:280px;" alt="{{$teacher->employee->first_name}} {{$teacher->employee->middle_name}} {{$teacher->employee->last_name}}">
            @endif
              <div class="member-content">
                  <h4><a href="{{route('web.teacher.detail',[$teacher->id,$teacher->employee->first_name])}}">{{$teacher->employee->first_name}} {{$teacher->employee->middle_name}} {{$teacher->employee->last_name}}</a></h4>
                <span>{{$teacher->employee->designation->designation_name}}</span>
                <div class="social">
                @foreach($teacher->employee->sosmed as $sosmed)
                  <a href="{{$sosmed->link_url}}" target="_blank"><i class="icofont-{{$sosmed->nama_sosmed}}"></i></a>
                @endforeach
                </div>
              </div>
            </div>
          </div>
        @endforeach

        </div>

      </div>
    </section><!-- End Trainers Section -->




</main><!-- End #main -->
@endsection
