        <div class="col-lg-4">
            {{-- <div class="sticky-top"> --}}
            <form action="{{route('event.list',['list'])}}" method="get">
                <div class="search mb-5">
                    <input type="text" placeholder='Cari Kegiatan' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'" name="search" style="outline : none;" required><input type="submit" value="Cari">
                </div>
            </form>

            <div class="course-info d-flex justify-content-center align-items-center">
              <h5><strong>Category</strong></h5>
            </div>
            @foreach($cate as $category)
            <div class="course-info d-flex justify-content-between align-items-center">
              <p><a href="{{route('events.bycategory',['category',$category->id,strtolower(preg_replace("/[^a-zA-Z0-9]/", "-", $category->cat_name))])}}">{{$category->cat_name}} ({{count($category->event)}})</a></p>
            </div>
            @endforeach

            <div class="course-info d-flex justify-content-center align-items-center">
              <h5><strong>Kegiatan Terbaru</strong></h5>
            </div>

             @foreach($even as $kegiatan)
             <a href="{{route('event.detail',['detail',$kegiatan->id,strtolower(preg_replace("/[^a-zA-Z0-9]/", "-", $kegiatan->event_title))])}}">
            <div class="course-info d-flex justify-content-between align-items-center">
                <img src="{{my_asset($kegiatan->event_image)}}" width="80px" alt="post">
              <p class="text-right">{{$kegiatan->event_title}}</a><br/>{{$kegiatan->start_date}} - {{$kegiatan->end_date}}</p>
            </div>
            </a>
            @endforeach

            <div class="course-info d-flex justify-content-center align-items-center">
              <h5><strong>Gallery Sekolah</strong></h5>
            </div>

            <div class="course-info d-flex align-items-center col-12">
                <div class="row">
            @foreach($gall as $image)
                <div class="col-6">
                    <a href="{{route('gallery')}}">
                        <img width="150px" height="100px" class="mr-1 mt-2" src="{{my_asset($image->image)}}" alt="">
                    </a>
                </div>
            @endforeach
                </div>
            </div>
            {{-- </div> --}}
    </div>
