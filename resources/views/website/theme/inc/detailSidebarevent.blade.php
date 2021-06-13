        <div class="col-lg-4 sticky-top">
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
              <p><a href="{{route('events.bycategory',['category',$category->id,strtolower(preg_replace("/[^a-zA-Z0-9]/", "-", $category->cat_name))])}}">{{$category->cat_name}} ({{count($category->event)}})</a></p>
            </div>
            @endforeach

          </div>
