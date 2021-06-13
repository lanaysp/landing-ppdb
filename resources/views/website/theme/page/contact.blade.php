@extends('website.theme.inc.app')
@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Kontak Sekolah</h2>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div data-aos="fade-up">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.4175903619507!2d110.6749677147711!3d-6.594908995230669!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e711fc844afa0b7%3A0x32e2b44e2cb945fd!2sEtnicode%20Media%20Solution!5e0!3m2!1sid!2sid!4v1613205220733!5m2!1sid!2sid" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Alamat Sekolah:</h4>
                <p>{{$sett->school_address}}</p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email Sekolah :</h4>
                <p>{{$sett->school_phone}}</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Kontak Sekolah:</h4>
                <p>{{$sett->school_email}}</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            {{-- <form action="forms/contact.php" method="post" role="form" class="php-email-form"> --}}
            <div class="form-contact php-email-form contact_form"  id="contactForm" novalidate="novalidate">
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" id="contactSubject" class="form-control" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Judul Pesan'"  placeholder="Judul Pesan" />

                </div>
                <div class="col-md-6 form-group">
                  <input type="text" class="form-control" id="contactName" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Nama Anda'" placeholder="Masukkan Nama Anda" />

                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" id="contactEmail" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Email Anda'" placeholder="Masukkan Email Anda" />

                </div>
                <div class="col-md-6 form-group">
                  <input type="hp" class="form-control" id="contactPhone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Nomor Ponsel'" placeholder="Masukkan Nomor Ponsel" data-rule="email" data-msg="Please enter a valid email" />

                </div>
              </div>

              <div class="form-group">
                <textarea class="form-control" id="contactAddress" rows="5" data-rule="required" data-msg="Please write something for us" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Alamat'" placeholder="Masukkan Alamat"></textarea>
              </div>
              <div class="form-group">
                <textarea class="form-control" rows="5" id ="contactDetail" data-rule="required" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Isi Pesan'" placeholder=" Isi Pesan"></textarea>
              </div>
              <div class="text-center"><button type="submit" id="load2" class="button-contactForm contactSending" data-loading-text="<i class='bx bx-comment'>" Processing Order>Kirim Pesan</button></div>
            </div>
            {{-- </form> --}}

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

@endsection
