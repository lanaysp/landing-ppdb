@extends('website.theme2.inc.app')
@section('content')

<!-- Breadcrumb section -->
<div class="site-breadcrumb">
    <div class="container">
        <a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-right"></i>
        <span>Kontak Us</span>
    </div>
</div>
<!-- Breadcrumb section end -->


<!-- Courses section -->
<section class="contact-page spad pt-0">
    <div class="container">

        <div class="form-contact contact_form" id="contactForm" novalidate="novalidate">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <input required class="form-control" id="contactSubject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Judul Pesan'" placeholder="Judul Pesan">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <textarea required class="form-control w-100" id="contactDetail" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Isi Pesan'" placeholder=" Isi Pesan"></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input required class="form-control valid" id="contactName" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Nama Anda'" placeholder="Masukkan Nama Anda">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input required class="form-control valid" id="contactEmail" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Email Anda'" placeholder="Masukkan Email Anda">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <input required class="form-control valid" id="contactPhone" type="number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Nomor Ponsel'" placeholder="Masukkan Nomor Ponsel">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input required class="form-control valid" id="contactAddress" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Alamat'" placeholder="Masukkan Alamat">
                    </div>
                </div>

            </div>
            <div class="form-group mt-3">
                <button type="submit" class="site-btn contactSending">Kirim Pesan</button>
            </div>
        </div>
    </div>
</section>
<!-- Courses section end-->
@endsection