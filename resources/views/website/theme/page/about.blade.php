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

    <!-- ======= Cource Details Section ======= -->
    <section id="course-details" class="courses course-details">
      <div class="container" data-aos="fade-up">

        <div class="row">

            <div class="col-lg-12" id="main">
                 <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2 mt-5" data-aos="fade-left" data-aos-delay="100">
            <img src="{{my_asset($visi->image_about)}}" class="img-fluid img-thumbnail rounded mt-4" alt="">
             <div class="video-icon">
                <a class="popup-video btn-icon" href="{{$visi->link_video}}"><i class="fas fa-play"></i></a>
             </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Tentang Sekolah</h3>
            <p class="font-italic">
             <?= $visi->about; ?>
            </p>

          </div>
        </div>

      </div>
    </section>

     <!-- ======= Cource Details Tabs Section ======= -->
    <section id="cource-details-tabs" class="cource-details-tabs">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#tab-1">Visi Sekolah</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-2">Misi Sekolah</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Visi Sekolah</h3>
                    <p class="font-italic"><?= $visi->vission; ?></p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2 mt-5">
                    <img src="{{my_asset($visi->image_vission)}}" alt="" class="img-fluid mt-4 rounded img-thumbnail">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Misi Sekolah</h3>
                    <p class="font-italic"><?= $visi->mission; ?></p>
                  </div>
                   <div class="col-lg-4 text-center order-1 order-lg-2 mt-5">
                    <img src="{{my_asset($visi->image_mission)}}" alt="" class="img-fluid mt-4 rounded img-thumbnail">
                  </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Cource Details Tabs Section --><!-- End About Section -->

   <section id="course-details" class="courses course-details">
      <div class="container" data-aos="fade-up">

        <div class="row">

            <div class="col-lg-12" id="main">
                 <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2 mt-5" data-aos="fade-left" data-aos-delay="100">
            <img src="{{my_asset($visi->image_slogan)}}" class="img-fluid img-thumbnail rounded mt-4" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Slogan Sekolah</h3>
            <p class="font-italic">
             <?= $visi->slogan; ?>
            </p>

          </div>
        </div>

      </div>
    </section>


</main><!-- End #main -->
@endsection
