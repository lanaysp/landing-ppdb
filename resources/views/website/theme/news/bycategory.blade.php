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
                        @foreach($news as $new)
                    <div class="col-lg-6 col-md-12 d-flex align-items-stretch">
                        <div class="course-item">
                        <img src="{{my_asset($new->thumbnail)}}" class="img-fluid img-thumbnail" alt="...">
                        <div class="course-content">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4>{{$new->news_date}}</h4>
                            <p class="price"><i class="bx bx-news"></i></p>
                            </div>

                            <h3><a href="{{route('news.detail',['detail',$new->id,strtolower(preg_replace("/[^a-zA-Z0-9]/", "-", $new->news_title))])}}">{{$new->news_title}}</a></h3>
                            <div class="trainer d-flex justify-content-between align-items-center">
                            <div class="trainer-profile d-flex align-items-center">
                                <span>
                                    <i class="bx bx-category"></i>&nbsp;{{$new->catnews->cat_name}}
                                </span>
                            </div>
                            <div class="trainer-rank d-flex align-items-center">
                                &nbsp;&nbsp;
                                <i class="bx bx-comment"></i>&nbsp;{{count($new->comment)}}
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                @endforeach
                   </div>
               </div>
                {{$news->links()}}

            </div>
          @include('website.theme.inc.detailSidebar')

        </div>

      </div>
    </section><!-- End Cource Details Section -->


</main><!-- End #main -->
@endsection
