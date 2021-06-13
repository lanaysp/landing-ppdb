@extends('website.theme2.inc.app')
@section('content')

<!-- Breadcrumb section -->
<div class="site-breadcrumb">
    <div class="container">
        <a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
        <span>{{$data->event_title}}</span>
    </div>
</div>
<!-- Breadcrumb section end -->


<!-- Blog page section  -->
<section class="blog-page-section spad pt-0">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="post-item post-details">
                    <img src="{{my_asset($data->event_image)}}" class="post-thumb-full" alt="">
                    <div class="post-content">
                        <h3><a href="javascript:void(0)">{{($data->event_title)}}</a></h3>
                        <div class="post-meta">
                            <span><i class="fa fa-th"></i>{{($data->category->cat_name)}}</span>
                            <span><i class="fa fa-calendar"></i> {{($data->start_date)}} - {{$data->end_date}}</span>
                        </div>
                        <?= $data->event_description; ?>
                        <div class="tag"><i class="fa fa-tag"></i> {{($data->category->cat_name)}}</div>
                    </div>

                </div>
            </div>
            <!-- sidebar -->
            <div class="col-sm-8 col-md-5 col-lg-4 col-xl-3 offset-xl-1 offset-0 pl-xl-0 sidebar">
                <!-- widget -->
                <div class="widget">
                    <form action="{{route('event.list',['list'])}}" method="get" class="search-widget">
                        <input type="text" name="search" placeholder="Cari Kegiatan Disini...">
                        <button type="submit"><i class="ti-search"></i></button>
                    </form>
                </div>
                <!-- widget -->
                <div class="widget">
                    <h5 class="widget-title">Kegiatan Baru</h5>
                    <div class="recent-post-widget">
                        <!-- recent post -->
                        @foreach($even as $kegiatan)
                        <a href="{{route('event.detail',['detail',$kegiatan->id,strtolower(preg_replace("/[^a-zA-Z0-9]/", "-", $kegiatan->event_title))])}}" class="rp-item">
                            <div class="rp-thumb set-bg" data-setbg="{{my_asset($kegiatan->event_image)}}"></div>
                            <div class="rp-content">
                                <h6>{{$kegiatan->event_title}}</h6>
                                <p><i class="fa fa-calendar"></i> {{$kegiatan->start_date}} - {{$kegiatan->end_date}}</p>
                            </div>
                        </a>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Blog page section end -->
@endsection