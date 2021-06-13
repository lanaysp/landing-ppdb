@extends('website.theme.inc.app')
@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs events" id="events" data-aos="fade-in">
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
    <section id="events" class="events course-details">
      <div class="container" data-aos="fade-up">

        <div class="row">
            <div class="col-lg-12" id="main">
                <div class="row">
                 @foreach($gallery as $gall)
                 <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-img popup-gallery">
                            <a href="{{my_asset($gall->image)}}">
                                <img width="509px" height="200px" class="rounded" src="{{ my_asset($gall->image) }}" alt="...">
                            </a>
                        </div>
                    </div>
                 </div>
                 @endforeach
             </div>
             {{$gallery->links()}}
            </div>

            </div>

        </div>

      </div>
    </section><!-- End Cource Details Section -->


</main><!-- End #main -->
@endsection

@section('script')
    <script>
        var popUp = $(".single_gallery_part .img-pop-up");
      if(popUp.length){
        popUp.magnificPopup({
          type: 'image',
          gallery:{
            enabled:true
          }
        });
      }
    </script>
@endsection
