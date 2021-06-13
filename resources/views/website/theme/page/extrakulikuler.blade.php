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

     <!-- ======= Courses Section ======= -->
    <section id="courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
        @foreach($data as $extra)
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <a href="{{route('web.detail.extra',[$extra->id,strtolower(preg_replace("/[^a-zA-Z0-9]/", "-", $extra->extra_name))])}}">
                <div class="course-item">
              <img width="350px" height="200px" src="{{my_asset($extra->extra_image)}}" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>{{$extra->extra_name}}</h4>
                </div>
                <p>{!! substr($extra->extra_note, 0, 200) !!} ... </p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <small>Pembimbing : {{$extra->teacher->employee->first_name}} {{$extra->teacher->employee->middle_name}} {{$extra->teacher->employee->last_name}}</small>
                  </div>
                </div>
              </div>
            </div>
            </a>
          </div> <!-- End Course Item-->
        @endforeach


        </div>

      </div>
    </section><!-- End Courses Section -->

</main><!-- End #main -->
@endsection
