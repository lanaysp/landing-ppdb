        <div class="col-lg-4 sticky-top" id="sticky-sidebar">
            {{-- <div class="sticky-top"> --}}
                 <form action="" method="get">
                <div class="search mb-5">
                    <input type="text" placeholder='Cari Berita' name="search" style="outline : none;" required><input type="submit" value="Cari">
                </div>
            </form>

            <div class="course-info d-flex justify-content-center align-items-center">
              <h5><strong>Category</strong></h5>
            </div>
            @foreach($cate as $category)
            <div class="course-info d-flex justify-content-between align-items-center">
              <p><a href="{{route('news.bycategory',[$category->id,strtolower(preg_replace("/[^a-zA-Z0-9]/","-",$category->cat_name))])}}">{{$category->cat_name}} ({{count($category->news)}})</a></p>
            </div>
            @endforeach

            <div class="course-info d-flex justify-content-center align-items-center">
              <h5><strong>Berita Terbaru</strong></h5>
            </div>

            @foreach($recent as $baru)
            <div class="course-info d-flex justify-content-between align-items-center">
                <img src="{{my_asset($baru->thumbnail)}}" width="80px" alt="post">
              <p class="text-right"><a href="{{route('news.detail',['detail',$baru->id,strtolower(preg_replace("/[^a-zA-Z0-9]/","-",$baru->news_title))])}}">{{$baru->news_title}}</a></p>
            </div>
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
