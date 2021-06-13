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


        </nav>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Cource Details Section ======= -->
    <section id="course-details" class="courses course-details">
      <div class="container" data-aos="fade-up">

        <div class="row">
            <div class="col-lg-8" id="main">
               <div class="col-12">
                   <div class="row">
                        @foreach($even as $event)
                    <div class="col-lg-6 col-md-12 mb-3 d-flex align-items-stretch">
                        <div class="course-item">
                        <img src="{{my_asset($event->event_image)}}" class="img-fluid img-thumbnail" alt="...">
                        <div class="course-content">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4>{{$event->start_date}} - {{$event->end_date}}</h4>
                            </div>

                            <h3><a href="{{route('event.detail',['detail',$event->id,strtolower(preg_replace("/[^a-zA-Z0-9]/", "-", $event->event_title))])}}">{{$event->event_title}}</a></h3>
                            <div class="trainer d-flex justify-content-between align-items-center">
                            <div class="trainer-profile d-flex align-items-center">
                                <span>
                                    <a href="{{route('events.bycategory',['category',$event->category->id,strtolower(preg_replace("/[^a-zA-Z0-9]/", "-", $event->category->cat_name))])}}"><i class="bx bx-category"></i>&nbsp;{{$event->category->cat_name}}</a>
                                </span>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                @endforeach
                   </div>
               </div>
                 {{$even->links()}}

            </div>
          @include('website.theme.inc.detailSidebarevent')

        </div>

      </div>
    </section><!-- End Cource Details Section -->


</main><!-- End #main -->
@endsection
