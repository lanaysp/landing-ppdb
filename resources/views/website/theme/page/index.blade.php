@extends('website.theme.inc.app')
@section('content')
<main id="main">

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center" style="background-image: url('{{my_asset($slide->image_slider)}}');">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>{{$slide->title_slider}}</h1>
      <h2>{{$slide->subtitle_slider}}</h2>
      <a href="{{$slide->button_link}}" class="btn-get-started">{{$slide->button_slider}}</a>
    </div>
  </section><!-- End Hero -->




    <!-- keunggulan -->
     <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Berikut Beberapa Keunggulan Sekolah</h2>
          <p>KEUNGGULAN SEKOLAH</p>
        </div>

        <div class="owl-carousel testimonials-carousel" data-aos="zoom-in" data-aos-delay="100">
        @foreach($feat as $feature)
          <div class="testimonial-wrap">
            <div class="testimonial-item">
                @if($feature->feature_icon != null)
                    <img src="{{my_asset($feature->feature_icon)}}" class="testimonial-img" alt="">
                @endif
              <h3>{{$feature->feature_title}}</h3>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                {{$feature->feature_description}}
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>
        @endforeach
        </div>

      </div>
    </section><!-- End Testimonials Section -->
    <!-- Event -->
     <section id="testimonials" class="testimonials events abu">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Kegiatan - kegiatan yang diadakan di sekolah</h2>
          <p>Events</p>
        </div>

        <div class="owl-carousel event-carousel" data-aos="zoom-in" data-aos-delay="100">
        @foreach($even as $event)

            <div class="card mr-3">
              <div class="card-img">
                <a href="javascript:void(0)"><img width="509px" height="200px" src="{{my_asset($event->event_image)}}" alt=""></a>
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="/event/detail/<?= $event->id . '/' . strtolower(preg_replace("/[^a-zA-Z0-9]/", "-", $event->event_title)); ?>">{{$event->event_title}}</a></h5>
                <p class="font-italic text-center"><a href="">{{$event->category->cat_name}}</a></p>
                <p class="card-text"><?= substr($event->event_description, 0, 100); ?>...</p>
              </div>
          </div>
        @endforeach

          </div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->


     <!-- ======= Visi - Misi ======= -->
    <section id="popular-courses" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Visi - Misi Sekolah Kami</h2>
          <p>Visi - Misi</p>
        </div>

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="{{my_asset($visi->image_vission)}}" class="img-fluid img-thumbnail rounded" alt="">
            <div class="video-icon">
                <a class="popup-video btn-icon" href="https://www.youtube.com/watch?v=qGmex96YSRM&t=553s"><i class="fas fa-play"></i></a>
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Visi Sekolah</h3>
            <p class="font-italic">
              <?= $visi->vission; ?>
            </p>
            <h3>Misi Sekolah</h3>
            <p class="font-italic">
              <?= $visi->mission; ?>
            </p>
          </div>
        </div>

      </div>
    </section><!-- End  -->

 <!-- Makul -->
 @if($sett->subject_appear == 1)
     <section id="testimonials guru" class="testimonials courses abu">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Mata Pelajaran Unggulan</h2>
          <p>Mata Pelajaran</p>
        </div>

        <div class="owl-carousel makul-carousel" data-aos="zoom-in" data-aos-delay="100">
            @foreach($mapel as $subject)
            <div class="course-item mr-1">
              <img width="509px" height="200px" src="{{my_asset($subject->mapel_image)}}" alt="">
              <div class="course-content">
                <div class="d-flex justify-content-center align-items-center mb-3">
                  <h4><a href="javascript:void(0)" class="text-white">{{$subject->mapel_name}}</a></h4>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          {{-- <div class="row mt-5"> --}}
              <div class="justify-content-center">
                  <div class="text-center mt-5">
                      <a href="{{ route('page.mapel')}}" class="get-started-btn">Lihat Lebih Banyak</a>
                    </div>
                </div>
            {{-- </div> --}}
        </div>

      </div>
    </section><!-- End Testimonials Section -->
    @endif


    <!-- Guru -->
    @if($sett->teacher_appear == 1)
     <section id="testimonials" class="testimonials trainers">
      <div class="container" data-aos="fade-up">

         <div class="section-title">
          <h2>Para Guru Di Sekolah Kami</h2>
          <p>Guru</p>
        </div>

    <div class="owl-carousel guru-carousel" data-aos="zoom-in" data-aos-delay="100">
        @foreach($guru as $teacher)
        <div class="member mr-2 img-fluid">
                @if($teacher->teacher_image != null)
                        <img src="{{my_asset($teacher->teacher_image)}}" class="img-fluid"  alt="{{$teacher->employee->username}}">
                        @else
                        <img src="{{my_asset($teacher->employee->photo)}}" class="img-fluid" alt="{{$teacher->employee->username}}">
                        @endif
                <div class="member-content">
                    <h4><a href="{{route('web.teacher.detail',[$teacher->id,$teacher->employee->first_name])}}">{{$teacher->employee->first_name}} {{$teacher->employee->middle_name}} {{$teacher->employee->last_name}}</a></h4>
                </div>
            </div>
        @endforeach
    </div>

      </div>
    </section><!-- End Testimonials Section -->
    @endif


     <!-- gallery -->
    {{-- <section id="testimonials" class="testimonials trainers">
      <div class="container" data-aos="fade-up">

         <div class="section-title">
          <h2>Gallery Kami</h2>
          <p>Gallery</p>
        </div>
      </div>

        <div class="owl-carousel makul-carousel" data-aos="zoom-in" data-aos-delay="100">
            @foreach($gallery as $gall)
           <div class="card mr-1 ml-1">
              <div class="card-img single_gallery_part">
                  <a href="{{my_asset($gall->image)}}" class="img-pop-up">
                    <img src="{{ my_asset($gall->image) }}" alt="">
                  </a>
              </div>
            </div>
            @endforeach
          </div>

        </div>


    </section> --}}
    <!-- End Testimonials Section -->


  </main><!-- End #main -->
@endsection
