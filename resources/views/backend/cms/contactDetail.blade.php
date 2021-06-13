@extends('backend.inc.app')
@section('content')
<div class="row">
    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-12s">
            <div class="card">
                <div class="padding-20">
                    <div class="tab-content tab-bordered" id="myTab3Content">
                        <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">Email</label>
                                    <input readonly type="email" class="form-control" value="{{$data->contact_email}}">
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Nama</label>
                                    <input type="text" value="{{$data->contact_name}}" class="form-control" readonly>
                                </div>
                                <div class="col-md-6">
                                    <br>
                                    <label class="control-label">Nomor Phonsel</label>
                                    <input type="number" value="{{$data->contact_phone}}" class="form-control" readonly>
                                </div>

                                <div class="col-md-6">
                                    <br>
                                    <label class="control-label">Perihal Pesan / Subject</label>
                                    <input type="text" value="{{$data->contact_subject}}" class="form-control" readonly>
                                </div>

                                <div class="col-md-12">
                                    <br>
                                    <label class="control-label">Alamat</label>
                                    <textarea class="form-control" readonly>{{$data->contact_address}}</textarea>
                                </div>

                                <div class="col-md-12">
                                    <br>
                                    <label class="control-label">Isi Pesan</label>
                                    <textarea  class="form-control" readonly >{{$data->contact_detail}}</textarea>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection