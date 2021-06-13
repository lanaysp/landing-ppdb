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

     <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-12 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="{{my_asset($data->archivement_photo)}}" class="img-fluid" alt="">
                <p class="text-left mt-3"><i class="bx bx-calendar"></i> {{$data->archivement_date}}</p>
            <h3>{{($data->archivement_name)}}</h3>
            <p class="font-italic">
              {!!$data->archivement_note!!}
            </p>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

</main><!-- End #main -->
@endsection
