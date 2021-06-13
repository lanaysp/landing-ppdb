@extends('website.theme.inc.app')
@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs testimonials" id="testimonials" data-aos="fade-in">
      <div class="container">
        <h2>{{$page}}</h2>
       <p>
        <i class="bx bx-home"></i>
        <a href="/" class="text-white">Home</a> |
        <a href="javascript:void(0)" class="text-white">{{$page}}</a>
       </p>

      </div>
    </div><!-- End Breadcrumbs -->


 <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
         @if($data->teacher_image != null)
            <img src="{{my_asset($data->teacher_image)}}" class="img-fluid" alt="{{$data->employee->first_name}} {{$data->employee->middle_name}} {{$data->employee->last_name}}">
         @else
            <img src="{{my_asset($data->employee->photo)}}" class="img-fluid" alt="{{$data->employee->first_name}} {{$data->employee->middle_name}} {{$data->employee->last_name}}" />
         @endif
             <div class="col-lg-12">
                <i class="bx bx-map mt-2"></i></i> {{$data->employee->alamat}} <br/>
                <i class="bx bx-mail-send mt-2"></i></i> {{$data->email}}
             </div>
             <div class="row col-12 justify-content-center mt-3">
                @foreach($data->employee->sosmed as $sosmed)
                <a href="{{$sosmed->link_url}}" class="mr-3"><i class="bx bx-lg bxl-{{$sosmed->nama_sosmed}}"></i></i> <br/></a>
                @endforeach
             </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>{{$data->employee->first_name}} {{$data->employee->middle_name}} {{$data->employee->last_name}}</h3>
            <small class="font-italic">
              {{$data->employee->designation->designation_name}}
            </small>
            <p>
              <?= $data->teacher_about; ?>
              <?= $data->teacher_experience; ?>
            </p>
            <ul>

                <div class="m-3">
                    <strong>Personal Skills :</strong>
                </div>
                <div class="col-12">
                    <div class="row">
                        @foreach($data->employee->skill as $skill)
                            <div class="col-lg-4 col-md-12">
                                <li><i class="icofont-check-circled"></i>{{$skill->skill_name}}</li>
                            </div>
                        @endforeach
                    </div>
                </div>
            </ul>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->



</main><!-- End #main -->
@endsection
