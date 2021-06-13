
  <!-- ======= Footer ======= -->
  <footer id="footer" class="abu">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <!-- <h3>Mentor</h3> -->
            <a href="" class="logo mr-auto img-fluid"><img src="{{my_asset($sett->website_logo)}}" alt="{{$sett->school_name}}" class="img-fluid mb-3"></a>
            <p>
              {{$sett->school_address}}<br/>
              <strong>Phone:</strong> <br/> {{$sett->school_phone}}<br/>
              <strong>Email:</strong> <br/> {{$sett->school_email}}<br/>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Info Sekolah & Umum</h4>
            <ul>
            @if($sett->teacher_appear == 1)
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('teacher.web')}}">Guru Sekolah</a></li>
            @endif

            @if($sett->subject_appear == 1)
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('page.mapel')}}">Mata Pelajaran Sekolah</a></li>
            @endif

            @if($sett->facility_appear == 1)
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('web.facility')}}">Fasilitas Sekolah</a></li>
            @endif

            @if($sett->prestation_appear)
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('web.archivement')}}">Prestasi</a></li>
            @endif

            {{-- @php
            $secondMenu = PageBuilder::where('position', '2')->get();
            @endphp --}}
            {{-- @foreach ($secondMenu as $second)
            <li><i class="bx bx-chevron-right"></i><a href="{{route('page.builder',[encrypt($second->id),strtolower(preg_replace("/[^a-zA-Z0-9]/","-",$second->page_name))])}}">{{$second->page_name}}</a></li>
            @endforeach --}}

            @if($sett->about_appear == 1)
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('vission')}}">Visi Misi</a></li>
            @endif

            @if($sett->extra_appear == 1)
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('web.extra')}}">Ekstrakulikuler</a></li>
            @endif

             {{-- @php
            $thereemenu = PageBuilder::where('position', '3')->get();
            @endphp --}}
            {{-- @foreach ($thereemenu as $theree)
            <li><i class="bx bx-chevron-right"></i><a href="{{route('page.builder',[encrypt($theree->id),strtolower(preg_replace("/[^a-zA-Z0-9]/","-",$theree->page_name))])}}">{{$theree->page_name}}</a></li>
            @endforeach --}}
            </ul>
          </div>

           <div class="col-lg-2 col-md-6 footer-links">
            <h4>Menu Lainya</h4>
            <ul>
              @if($sett->teacher_appear == 1)
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('teacher.web')}}">Guru Sekolah</a></li>
            @endif

            @if($sett->subject_appear == 1)
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('page.mapel')}}">Mapel</a></li>
            @endif
               @if($sett->facility_appear == 1)
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('web.facility')}}">Fasilitas Sekolah</a></li>
            @endif

            @if($sett->prestation_appear)
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('web.archivement')}}">Prestasi</a></li>
            @endif
            {{-- @php
                $secondMenu = PageBuilder::where('position', '2')->get();
            @endphp --}}

            {{-- @foreach ($secondMenu as $second)
            <li><i class="bx bx-chevron-right"><a href="{{route('page.builder',[encrypt($second->id),strtolower(preg_replace("/[^a-zA-Z0-9]/","-",$second->page_name))])}}">{{$second->page_name}}</a></li>
            @endforeach --}}
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>SUBCRIBE</h4>
            <p>Utuk Seputar Info Sekolah Kami</p>
            <div class="form-group">
              <input type="email" id="emailSub" name="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Email Anda'" placeholder='Masukkan Email Anda' style="outline : none;" required><input class="sendSubcribe" type="submit" value="Subscribe">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright <strong><span>Etnicode</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          {{$sett->copy_right}}
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="{{$sett->twitter}}" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="{{$sett->facebook}}" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="{{$sett->instagram}}" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-youtube"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->
