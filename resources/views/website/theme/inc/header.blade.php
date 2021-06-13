<!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <!-- <h1 class="logo mr-auto"><a href="index.html">Mentor</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="{{route('home')}}" class="logo mr-auto"><img src="{{my_asset($sett->website_logo)}}" alt="" class="img-fluid"></a>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="{{route('home')}}">Home</a></li>
          <li class="drop-down"><a href="javascript:void(0)">Tentang</a>
            <ul>
            @if($sett->about_appear == 1)
              <li ><a href="{{ route('vission')}}">Tentang Sekolah</a></li>
            @endif

            @if($sett->teacher_appear == 1)
              <li><a href="{{ route('teacher.web')}}">Guru Sekolah</a></li>
            @endif

            @if($sett->facility_appear == 1)
              <li><a href="{{ route('web.facility')}}">Fasilitas Sekolah</a></li>
            @endif

            @if($sett->extra_appear == 1)
              <li><a href="{{ route('web.extra')}}">Extrakulikuler</a></li>
            @endif

            @if($sett->prestation_appear)
              <li><a href="{{ route('web.archivement')}}">Prestasi</a></li>
            @endif
            </ul>
          </li>
        @if($sett->activity_appear)
          <li><a href="{{route('event.list',['list'])}}">Kegiatan</a></li>
        @endif

        @if($sett->news_appear)
          <li><a href="/news/list">Berita</a></li>
        @endif

        @if($sett->gallery_appear)
          <li><a href="{{route('gallery')}}">Galeri</a></li>
        @endif

        @if($sett->contact_appear)
          <li><a href="{{route('contact')}}">Kontak</a></li>
        @endif

        @if(Auth()->user())
        @if(Auth()->user()->type_account == 'administrator')

        <a href="{{route('dashboard')}}" target="_blank" class="get-started-btn d-lg-none d-sm-inline-block text-white">Dashboard</a>

        @elseif(Auth()->user()->type_account == 'ppdb')
        <a href="{{route('ppdb.dashboard')}}" target="_blank" class="get-started-btn d-lg-none d-sm-inline-block text-white">Dashboard</a>
        @endif
        @else
          <li><a target="_blank" class="d-lg-none d-sm-inline-block" href="/ppdb/register">PPBD</a></li>
          <li><a target="_blank" class="d-lg-none d-sm-inline-block" href="{{route('login')}}">LOGIN</a></li>
        @endif
        </ul>
      </nav><!-- .nav-menu -->

      <div class="d-none d-sm-block">
        @if(Auth()->user())
        @if(Auth()->user()->type_account == 'administrator')

        <a href="{{route('dashboard')}}" target="_blank" class="get-started-btn">Dashboard</a>

        @elseif(Auth()->user()->type_account == 'ppdb')
        <a href="{{route('ppdb.dashboard')}}" target="_blank" class="get-started-btn">Dashboard</a>
        @endif
        @else
        <div class="btn-group" role="group" aria-label="Basic example">
          <a target="_blank" href="/ppdb/register" class="btn get-started-btn">PPBD</a>
          <a target="_blank" href="{{route('login')}}" class="btn get-started-btn">LOGIN</a>
        </div>
        @endif
      </div>


    </div>
  </header><!-- End Header -->
