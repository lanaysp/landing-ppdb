@extends('website.theme.inc.app')
@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="testimonials breadcrumbs" id="testimonials" data-aos="fade-in">
      <div class="container">
        <h2>{{$data->event_title}}</h2>
       <p>
        <i class="bx bx-home"></i>
        <a href="/" class="text-white">Home</a> |
        <i class="bx bx-category"></i>
         <a href="{{route('event.list',['list'])}}" class="text-white">List Kegiatan</a> |
        <i class="bx bx-news"></i>
        <a href="javascript:void(0)" class="text-white">{{$page}}</a>
       </p>


        </nav>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Cource Details Section ======= -->
    <section id="course-details" class="courses course-details testimonials">
      <div class="container" data-aos="fade-up">
        <div class="row align-items-start">
            <div class="col-lg-8 content-section">
                <img src="{{my_asset($data->event_image)}}" class="img-fluid" alt="">
                <h3>{{($data->event_title)}}</h3>
                    <div class="trainer-rank d-flex align-items-center text-right">
                        <a href="javascript:void(0)"><i class="bx bx-news"></i>&nbsp;{{($data->category->cat_name)}}</a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0)"><i class="bx bx-calendar"></i>&nbsp; {{($data->start_date)}} - {{$data->end_date}}</a>
                    </div>
                <p>
                   <?= $data->event_description; ?>
                </p>

            <div class="navigation-top">
                <div class="d-sm-flex justify-content-between text-center">
                <!-- AddToAny BEGIN -->
                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                        <a class="a2a_button_facebook"></a>
                        <a class="a2a_button_twitter"></a>
                        <a class="a2a_button_whatsapp"></a>
                        <a class="a2a_button_telegram"></a>
                        <a class="a2a_button_print"></a>
                        <a class="a2a_button_line"></a>
                        <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                    </div>
                    <script async src="https://static.addtoany.com/menu/page.js"></script>
                    <!-- AddToAny END -->
                </div>
            </div>

            </div>
          @include('website.theme.inc.sidebarevent')
        </div>

      </div>
    </section><!-- End Cource Details Section -->


</main><!-- End #main -->

@endsection
