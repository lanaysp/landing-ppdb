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

 `


     <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container" data-aos="fade-up">

        <div class="row">
        @foreach($data as $fasilitas)
        <div class="col-md-4 d-flex align-items-stretch">
            <div class="card">

                <div class="card-img popup-gallery">
                <a href="{{my_asset($fasilitas->facility_image)}}">
                    <img width="509px" height="200px" src="{{my_asset($fasilitas->facility_image)}}" alt="...">
                </a>
                </div>

                <div class="card-body">
                <h5 class="card-title popup-gallery"><a href="{{my_asset($fasilitas->facility_image)}}">{{$fasilitas->facility_name}}</a></h5>
                <p class="card-text">{{$fasilitas->deskripsi}}</p>
                </div>

            </div>
        </div>
        @endforeach
        </div>

      </div>
    </section><!-- End Events Section -->

</main><!-- End #main -->
@endsection
