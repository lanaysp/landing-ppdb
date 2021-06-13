<div class="col-sm-8 col-md-5 col-lg-4 col-xl-3 offset-xl-1 offset-0 pl-xl-0 sidebar">
    <!-- widget -->
    <div class="widget">
        <form action="{{route('news.index',['list'])}}" method="GET" class="search-widget">
            <input type="text" name="search" placeholder="Cari Berita Disini...">
            <button type="submit"><i class="ti-search"></i></button>
        </form>
    </div>
    <!-- widget -->
    <div class="widget">
        <h5 class="widget-title">Berita Terbaru</h5>
        <div class="recent-post-widget">
            <!-- recent post -->
            @foreach($recent as $baru)
            <a href="{{route('news.detail',['detail',$baru->id,strtolower(preg_replace("/[^a-zA-Z0-9]/","-",$baru->news_title))])}}" class="rp-item">
                <div class="rp-thumb set-bg" data-setbg="{{my_asset($baru->thumbnail)}}"></div>
                <div class="rp-content">
                    <h6>{{$baru->news_title}}</h6>
                    <p><i class="fa fa-clock-o"></i> {{$baru->news_date}}</p>
                </div>
            </a>
            @endforeach

        </div>
    </div>

    <div class="widget">
        <h4 class="widget-title">Kategori Berita</h4>
        <ul>
            @foreach($cate as $category)
            <li><a href="/news/by/{{$category->id}}/<?= strtolower(preg_replace("/[^a-zA-Z0-9]/", "-", $category->cat_name)); ?>">{{$category->cat_name}} ({{count($category->news)}}) </a></li>
            @endforeach
        </ul>
    </div>
</div>