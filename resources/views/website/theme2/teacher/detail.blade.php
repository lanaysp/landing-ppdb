@extends('website.theme.inc.app')
@section('content')
<main>
    <!--? slider Area Start-->
    <section class="slider-area slider-area2">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-11 col-md-12">
                            <div class="hero__caption hero__caption2">
                                <h1 data-animation="bounceIn" data-delay="0.2s">{{$page}}</h1>
                                <!-- breadcrumb Start-->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">{{$page}}</a></li>
                                    </ol>
                                </nav>
                                <!-- breadcrumb End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-area1 fix pt-10" style="margin-top: 40px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="teacher_left">
                        <div class="teacher_delImg">
                            @if($data->teacher_image != null)
                            <img src="{{my_asset($data->teacher_image)}}" alt="{{$data->employee->first_name}} {{$data->employee->middle_name}} {{$data->employee->last_name}}" />
                            @else
                            <img src="{{my_asset($data->employee->photo)}}" alt="{{$data->employee->first_name}} {{$data->employee->middle_name}} {{$data->employee->last_name}}" />
                            @endif
                        </div>
                    </div>
                    <ul class="social-default">
                        @foreach($data->employee->sosmed as $sosmed)
                        <li class="social-facebook">
                            <a href="{{$sosmed->link_url}}" target="_blank"><i class="fab fa-{{$sosmed->nama_sosmed}}" aria-hidden="true"></i></a>
                        </li>
                        @endforeach
                    </ul>
                    <ul class="teacher-address">
                        <li>
                            <span><i class="fas fa-home" aria-hidden="true"></i></span>{{$data->employee->alamat}}
                        </li>
                        <li>
                            <span><i class="fas fa-envelope" aria-hidden="true"></i></span>{{$data->email}}
                        </li>
                    </ul>
                </div>
                <div class="col-lg-8">
                    <div class="teacher_del">
                        <h3>{{$data->employee->first_name}} {{$data->employee->middle_name}} {{$data->employee->last_name}}</h3>
                        <div class="designation">{{$data->employee->designation->designation_name}}</div>
                        <?= $data->teacher_about; ?>
                        <?= $data->teacher_experience; ?>
                        <div class="progress-skill">
                            <h3>Personal Skills</h3>

                            @foreach($data->employee->skill as $skill)
                            <div class="progress-wrap" data-animation-section="progress-line">
                                <p class="progress-head">{{$skill->skill_name}} <span>{{$skill->persentase}}%</span></p>
                                <div class="progress-line-wrap">
                                    <div class="progress-line color-4" data-animation-block="is-vision" data-value="{{$skill->persentase}}" style="width: {{$skill->persentase}}%"></div>
                                </div>
                            </div>
                            @endforeach
                           
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </section>
</main>
@endsection