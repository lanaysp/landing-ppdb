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

     <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container" data-aos="fade-up">

        <div class="row">
        @foreach($data as $prestasi)
          <div class="col-md-6 d-flex align-items-stretch">
              <a href="{{route('web.detail.archivement',[$prestasi->id,strtolower(preg_replace("/[^a-zA-Z0-9]/", "-", $prestasi->archivement_name))])}}">
            <div class="card">
              <div class="card-img">
                <img height="300px" src="{{my_asset($prestasi->archivement_photo)}}" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="{{route('web.detail.archivement',[$prestasi->id,strtolower(preg_replace("/[^a-zA-Z0-9]/", "-", $prestasi->archivement_name))])}}">{{$prestasi->archivement_name}}</a></h5>
              </div>
            </div>
              </a>
          </div>
        @endforeach
      </div>
    </section><!-- End Events Section -->

</main><!-- End #main -->
@endsection
