@extends('website.theme.inc.app')
@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="testimonials breadcrumbs" id="testimonials" data-aos="fade-in">
      <div class="container">
        <h2>{{$page}}</h2>
       <p>
        <i class="bx bx-home"></i>
        <a href="/" class="text-white">Home</a> |
        <i class="bx bx-category"></i>
         <a href="/news/list" class="text-white">List Berita</a> |
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
                <img src="{{my_asset($news->thumbnail)}}" class="img-fluid" alt="">
                <h3>{{$news->news_title}}</h3>
                <div class="trainer-rank d-flex align-items-center text-right">
                    <a href="/news/category/{{$news->catnews->id}}/<?= strtolower(preg_replace("/[^a-zA-Z0-9]/", "-", $news->catnews->cat_name)); ?>"><i class="bx bx-news"></i>&nbsp;{{$news->catnews->cat_name}}</a>
                    &nbsp;&nbsp;
                    <a href="javascript:void(0)"><i class="bx bx-comment"></i>&nbsp;{{count($news->comment)}} Komentar</a>
                    &nbsp;&nbsp;
                    <a href="javascript:void(0)"><i class="bx bx-calendar"></i>&nbsp; {{$news->news_date}}</a>
                </div>
                <p>
                    <?= $news->news_description; ?>
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

        <div class="testimonial-wrap">
            <div class="testimonial-item">
                    <img src="{{my_asset($news->author->photo)}}" class="testimonial-img" alt="">
                <h3>{{$news->author->first_name}} {{$news->author->last_name}}</h3>
            </div>
        </div>

    <div class="comments-area" id="berita" data-berita="{{$news->id}}">
        <div class="section-title">
          <h2>Komentar ( {{count($news->comment)}} )</h2>
        </div>
        @foreach($news->comment as $komentar)
        <div class="testimonial-wrap">
            <div class="testimonial-item">
              <img src="{{my_asset($komentar->user->image)}}" class="testimonial-img" alt="">
              <h3>{{$komentar->user->first_name}} {{$komentar->user->last_name}}</h3>
              <h4>{{$komentar->created_at}}</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                {{$komentar->comment_description}}
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
        </div>
        @endforeach
    </div>

    <div class="contact" id="berita" data-berita="{{$news->id}}">
        <div class="section-title">
          <h2>Komentari Berita Ini</h2>
        </div>
        @if(Auth()->user())
        <div class="php-email-form">
            <div class="form-group" id="commentForm">
            <textarea class="form-control" id="isiComment" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Tulis Komentar Disini"></textarea>
            <div class="validate"></div>
        </div>
        <div class="text-center"><button type="button" class="sendComment">Kirim Komentar</button></div>
        </div>
        @else
        <div class="php-email-form">
            <div class="text-center"><a href="javascript:void(0)" class="get-started-btn">Log - in Untuk Mulai Berkomentar</a></div>
        </div>
        @endif
    </div>



            </div>
          @include('website.theme.inc.sidebar')

        </div>

      </div>
    </section><!-- End Cource Details Section -->


</main><!-- End #main -->

@endsection
