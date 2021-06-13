<div class="col-lg-4">
    <div class="blog_right_sidebar">
        <aside class="single_sidebar_widget search_widget">
            <form action="" method="get">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control" placeholder='Cari Berita'>
                        <div class="input-group-append">
                            <button class="btns" type="submit"><i class="ti-search"></i></button>
                        </div>
                    </div>
                </div>
                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Search</button>
            </form>
        </aside>
        <aside class="single_sidebar_widget post_category_widget">
            <h4 class="widget_title" style="color: #2d2d2d;">Kategori Berita</h4>
            <ul class="list cat-list">
                @foreach($cate as $category)
                <li>
                    <a href="{{route('news.bycategory',[$category->id,strtolower(preg_replace("/[^a-zA-Z0-9]/","-",$category->cat_name))])}}" class="d-flex">
                        <p>{{$category->cat_name}}</p>
                        <p>({{count($category->news)}})</p>
                    </a>
                </li>
                @endforeach
            </ul>
        </aside>

        <aside class="single_sidebar_widget newsletter_widget">
            <h4 class="widget_title" style="color: #2d2d2d;">Subcribe</h4>
            <div id="subcribe">
                <div class="form-group">
                    <input type="email" id="emailSub" class="form-control" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Email Anda'" placeholder='Masukkan Email Anda' required>
                </div>
                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn sendSubcribe" type="submit">Subscribe</button>
            </div>
        </aside>
    </div>
</div>