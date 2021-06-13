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
            @foreach($data as $subject)
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item mr-1 mb-4">
              <img width="300px" height="200px" src="{{my_asset($subject->mapel_image)}}" alt="">
              <div class="course-content">
                <div class="d-flex justify-content-center align-items-center mb-3">
                  <h4><a href="javascript:void(0)" class="text-white">{{$subject->mapel_name}}</a></h4>
                </div>
              </div>
            </div>
        </div>
        @endforeach
            </div>
          </div> <!-- End Course Item-->



        </div>

      </div>
    </section><!-- End Courses Section -->

</main><!-- End #main -->
@endsection
