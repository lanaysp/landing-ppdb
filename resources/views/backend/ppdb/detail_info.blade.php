@extends('backend.inc.app')
@section('content')
<div class="section-body">
    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-4">
            <div class="card author-box">
                <div class="card-body">
                    <div class="author-box-center">
                        <div class="clearfix"></div>
                        <div class="author-box-name">
                            <a href="#">{{$data->title}}</a>
                        </div>
                        <div class="author-box-job">Guide Type {{$data->type}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-8">
            <div class="card">
                <div class="padding-20">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#detail" role="tab" aria-selected="true">Detail Prestasi</a>
                        </li>
                    </ul>
                    <div class="tab-content tab-bordered" id="myTab3Content">
                        <div class="tab-pane fade show active" id="detail" role="tabpanel" aria-labelledby="home-tab2">
                            <?= $data->description; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection