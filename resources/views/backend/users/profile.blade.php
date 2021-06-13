@extends('backend.inc.app')
@section('content')
@section('style')
<link rel="stylesheet" href="{{my_asset('plugins/summernote/summernote-bs4.css')}}">
<link rel="stylesheet" href="{{my_asset('plugins/chocolat/dist/css/chocolat.css')}}">
<link rel="stylesheet" href="{{my_asset('plugins/dropify/css/dropify.min.css')}}">
@endsection
<div class="section-body">
    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-4">
            <div class="card author-box">
                <div class="card-body">
                    <div class="author-box-center">
                        <img alt="image" src="{{my_asset($data->photo)}}" class="rounded-circle author-box-picture">
                        <div class="clearfix"></div>
                        <div class="author-box-name">
                            <a href="#">{{$data->username}}</a>
                        </div>
                        <div class="author-box-job">{{$data->Designation->designation_name}}</div>
                    </div>
                    <div class="text-center">
                        <div class="author-box-description">
                            <p>
                                {{$data->alamat}}
                            </p>
                        </div>
                        <div class="mb-2 mt-3">
                            <div class="text-small font-weight-bold">Social Media</div>
                        </div>
                        <a href="#" data-toggle="modal" data-target=".add-sosmed" class="btn btn-social-icon mr-1 btn-primary">
                            <i class="fa fa-plus"></i>
                        </a>
                        @foreach($data->sosmed as $sosmed)
                        <a href="{{$sosmed->link_url}}" class="btn btn-social-icon mr-1 btn-info" data-toggle="modal" data-target=".update-{{$sosmed->id}}">
                            <i class="fab fa-{{$sosmed->nama_sosmed}}"></i>
                        </a>
                        @endforeach
                        <div class="w-100 d-sm-none"></div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Personal Detail</h4>
                    <a href="{{route('admin.update.profile')}}" class="btn btn-sm btn-primary">
                        <i class="fa fa-user"></i> Update Profile
                    </a>
                </div>
                <div class="card-body">
                    <div class="py-4">
                        <p class="clearfix">
                            <span class="float-left">
                                Tanggal Lahir
                            </span>
                            <span class="float-right text-muted">
                                {{$data->ttl}}
                            </span>
                        </p>
                        <p class="clearfix">
                            <span class="float-left">
                                Ponsel
                            </span>
                            <span class="float-right text-muted">
                                {{$data->ponsel}}
                            </span>
                        </p>
                        <p class="clearfix">
                            <span class="float-left">
                                Nik
                            </span>
                            <span class="float-right text-muted">
                                {{$data->nik}}
                            </span>
                        </p>
                        <p class="clearfix">
                            <span class="float-left">
                                KK
                            </span>
                            <span class="float-right text-muted">
                                {{$data->kk}}
                            </span>
                        </p>
                        @if($data->ktp != '-')
                        <img src="{{my_asset($data->ktp)}}" style="max-width: 200px;">
                        @endif
                    </div>

                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Skills</h4>
                    <button class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target=".add-skill">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled user-progress list-unstyled-border list-unstyled-noborder">

                        @foreach($data->skill as $skill)
                        <li class="media">
                            <div class="media-body">
                                <div class="media-title">
                                    <a href="#" data-target=".update-skill{{$skill->id}}" data-toggle="modal">{{$skill->skill_name}}</a>
                                </div>
                            </div>
                            <div class="media-progressbar p-t-10">
                                <div class="progress" data-height="6">
                                    <div class="progress-bar bg-primary" data-width="{{$skill->persentase}}%"></div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-8">
            <div class="card">
                <div class="padding-20">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab" aria-selected="true">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#pendidikan" role="tab" aria-selected="false">Pendidikan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#perjalanan" role="tab" aria-selected="false">Pengalaman</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#gallery" role="tab" aria-selected="false">Gallery</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#postingan" role="tab" aria-selected="false">Postingan</a>
                        </li> -->
                    </ul>
                    <div class="tab-content tab-bordered" id="myTab3Content">
                        <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                            <div class="row">
                                <div class="col-md-12 col-12 b-r">
                                    @if($data->about != null)
                                    <button class="btn btn-sm btn-warning pull-right" data-toggle="modal" data-target=".update-about{{$data->about->id}}" style="margin-bottom: 20px;">
                                        <i class="fa fa-edit"></i> Update Tentang Diri
                                    </button>
                                    @else
                                    <button class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target=".add-about" style="margin-bottom: 20px;">
                                        <i class="fa fa-edit"></i> Tambah Tentang Diri
                                    </button>
                                    @endif
                                </div>
                            </div>
                            <div>
                                @if($data->about != null)
                                <?= $data->about->description; ?>
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pendidikan" role="tabpanel" aria-labelledby="profile-tab2">
                            <div class="row">
                                <button class="btn btn-info" data-toggle="modal" style="margin-bottom: 40px; margin-left:20px;" data-target=".add-pendidikan">
                                    <i class="fa fa-plus"></i> Tambah Riwayat Pendidikan
                                </button>
                                <div class="col-12">
                                    <div class="activities">
                                        @foreach($data->education as $education)
                                        <div class="activity">
                                            <div class="activity-icon bg-primary text-white">
                                                <i class="fa fa-graduation-cap"></i>
                                            </div>
                                            <div class="activity-detail">
                                                <div class="mb-2">
                                                    <span class="text-job" style="color: black;">{{$education->tahun_masuk}} - {{$education->tahun_lulus}}</span>
                                                    <span class="bullet"></span>
                                                    <a class="text-job" href="#">{{$education->school_name}}</a>
                                                    <div class="float-right dropdown">
                                                        <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                                        <div class="dropdown-menu">
                                                            <div class="dropdown-title">Options</div>
                                                            <a href="#" class="dropdown-item has-icon " data-target=".education-update{{$education->id}}" data-toggle="modal"><i class="fa fa-edit"></i> Update</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a href="{{route('employee.crud',['deleteEducation',$education->id])}}" class="dropdown-item has-icon"><i class="fa fa-trash"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p>{{$education->keterangan}}</p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="perjalanan" role="tabpanel" aria-labelledby="profile-tab3">
                            <div class="row">
                                <button class="btn btn-success" data-toggle="modal" style="margin-bottom: 40px; margin-left:20px;" data-target=".add-perjalanan">
                                    <i class="fa fa-plus"></i> Tambah Riwayat Pengalaman
                                </button>
                                <div class="col-12">
                                    <div class="activities">
                                        @foreach($data->experience as $expe)
                                        <div class="activity">
                                            <div class="activity-icon bg-success text-white">
                                                <i class="fa fa-plane"></i>
                                            </div>
                                            <div class="activity-detail">
                                                <div class="mb-2">
                                                    <span class="text-job" style="color: black;"> {{$expe->date}} </span>
                                                    <span class="bullet"></span>
                                                    <a class="text-job" href="#">{{$expe->place}}</a>
                                                    <div class="float-right dropdown">
                                                        <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                                        <div class="dropdown-menu">
                                                            <div class="dropdown-title">Options</div>
                                                            <a href="#" class="dropdown-item has-icon " data-target=".experience-update{{$expe->id}}" data-toggle="modal"><i class="fa fa-edit"></i> Update</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a href="{{route('employee.crud',['deleteExperience',$expe->id])}}" class="dropdown-item has-icon"><i class="fa fa-trash"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p>{{$expe->detail}}</p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="gallery" role="tabpanel" aria-labelledby="profile-tab4">
                            <div class="row">
                                <button class="btn btn-primary" data-toggle="modal" style="margin-bottom: 40px; margin-left:20px;" data-target=".add-gallery">
                                    <i class="fa fa-plus"></i> Tambah Gallery
                                </button>

                                <button class="btn btn-danger" data-toggle="modal" style="margin-bottom: 40px; margin-left:20px;" data-target=".delete-gallery">
                                    <i class="fa fa-plus"></i> Delete Gallery
                                </button>

                                <div class="col-12 col-sm-12 col-lg-12">
                                    <div class="gallery gallery-md">
                                        @foreach($data->gallery as $gallery)
                                        <div class="gallery-item" data-image="{{my_asset($gallery->gallery_image)}}" data-title="{{$gallery->gallery_caption}}"></div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@include('backend.partials.employeeDetail')
@section('script')
<script src="{{my_asset('plugins/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>
<script src="{{my_asset('admin/theme/js/page/gallery1.js')}}"></script>
<script src="{{my_asset('plugins/summernote/summernote-bs4.js')}}"></script>

<script src="{{my_asset('plugins/dropify/js/dropify.min.js')}}"></script>
<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();
    });
</script>
@endsection
@endsection