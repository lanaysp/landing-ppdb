<div class="modal fade add-sosmed" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Tambah Data Social Media</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('employee.insert.sosmed',['insertSosmed'])}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label"> Nama Social Media</label>
                            <input type="hidden" name="employee_id" value="{{$data->id}}">
                            <input type="text" class="form-control" placeholder="Sample : Facebook" name="nama_sosmed" value="{{old('nama_sosmed')}}">
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label"> Url Social Media</label>
                            <input type="url" class="form-control" placeholder="https://facebook.com" name="link_url" value="{{old('link_url')}}">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 40px;">
                        <div class="col-lg-12 col-sm-12">
                            <button type="reset" class="btn btn-warning"> Reset</button>
                            <button type="submit" class="btn btn-primary"> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@foreach($data->sosmed as $updatesos)
<div class="modal fade update-{{$updatesos->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Update Data Social Media</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('employee.insert.sosmed',['updateSosmed'])}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label"> Nama Social Media</label>
                            <input type="hidden" name="id" value="{{$updatesos->id}}">
                            <input type="text" class="form-control" name="nama_sosmed" value="{{$updatesos->nama_sosmed}}">
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label"> Url Social Media</label>
                            <input type="url" class="form-control" name="link_url" value="{{$updatesos->link_url}}">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 40px;">
                        <div class="col-lg-12 col-sm-12">
                            <button type="reset" class="btn btn-warning"> Reset</button>
                            <button type="submit" class="btn btn-primary"> Simpan</button>
                            <a class="btn btn-danger pull-right" href="{{route('employee.crud',['deleteSosmed',$updatesos->id])}}">
                                <i class="fa fa-trash"></i> Delete Sosmed ini
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<div class="modal fade add-skill" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Tambah Data Skill</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('employee.insert.sosmed',['insertSkill'])}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label"> Nama Skill</label>
                            <input type="hidden" name="employee_id" value="{{$data->id}}">
                            <input type="text" class="form-control" name="skill_name" value="{{old('skill_name')}}">
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label"> Persentase Menguasai</label>
                            <input type="number" class="form-control" name="persentase" value="{{old('persentase')}}">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 40px;">
                        <div class="col-lg-12 col-sm-12">
                            <button type="reset" class="btn btn-warning"> Reset</button>
                            <button type="submit" class="btn btn-primary"> Simpan</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach($data->skill as $updateskill)
<div class="modal fade update-skill{{$updateskill->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Update Skill</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('employee.insert.sosmed',['updateSkill'])}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label"> Nama Skill</label>
                            <input type="hidden" name="id" value="{{$updateskill->id}}">
                            <input type="text" class="form-control" name="skill_name" value="{{$updateskill->skill_name}}">
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label"> Persentase Menguasai</label>
                            <input type="number" class="form-control" name="persentase" value="{{$updateskill->persentase}}">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 40px;">
                        <div class="col-lg-12 col-sm-12">
                            <button type="reset" class="btn btn-warning"> Reset</button>
                            <button type="submit" class="btn btn-primary"> Simpan</button>
                            <a class="btn btn-danger pull-right" href="{{route('employee.crud',['deleteSkill',$updateskill->id])}}">
                                <i class="fa fa-trash"></i> Delete Skill ini
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach


@if($data->about != null)
<div class="modal fade update-about{{$data->about->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Update Deskripsi Personal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('employee.insert.sosmed',['updateAbout'])}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Tuliskan Detail Diri Anda</label>
                            <input type="hidden" name="id" value="{{$data->about->id}}">
                            <textarea class="summernote" name="description">{{$data->about->description}}</textarea>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 40px;">
                        <div class="col-lg-12 col-sm-12">
                            <button type="reset" class="btn btn-warning"> Reset</button>
                            <button type="submit" class="btn btn-primary"> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@else
<div class="modal fade add-about" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Keterangan Personal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('employee.insert.sosmed',['insertAbout'])}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Tuliskan Detail Diri Anda</label>
                            <input type="hidden" name="employee_id" value="{{$data->id}}">
                            <textarea class="summernote" name="description">{{old('description')}}</textarea>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 40px;">
                        <div class="col-lg-12 col-sm-12">
                            <button type="reset" class="btn btn-warning"> Reset</button>
                            <button type="submit" class="btn btn-primary"> Simpan</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif

<div class="modal fade add-pendidikan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Tambah Data Riwayat Pendidikan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('employee.insert.sosmed',['insertEducation'])}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Nama Sekolah</label>
                            <input type="hidden" name="employee_id" value="{{$data->id}}">
                            <input type="text" class="form-control" placeholder="Sample : SMK IT AL-FATH" name="school_name" value="{{old('school_name')}}">
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label">Tanggal Awal Masuk</label>
                            <input type="date" class="form-control" name="tahun_masuk" value="{{old('tahun_masuk')}}">
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label">Tanggal Kelulusan</label>
                            <input type="date" class="form-control" name="tahun_lulus" value="{{old('tahun_lulus')}}">
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label">Keterangan</label>
                            <textarea class="form-control" name="keterangan">{{old('keterangan')}}</textarea>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 40px;">
                        <div class="col-lg-12 col-sm-12">
                            <button type="reset" class="btn btn-warning"> Reset</button>
                            <button type="submit" class="btn btn-primary"> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach($data->education as $edu)
<div class="modal fade education-update{{$edu->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Update Data Riwayat Pendidikan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('employee.insert.sosmed',['updateEducation'])}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Nama Sekolah</label>
                            <input type="hidden" name="id" value="{{$edu->id}}">
                            <input type="text" class="form-control" placeholder="Sample : SMK IT AL-FATH" name="school_name" value="{{$edu->school_name}}">
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label">Tanggal Awal Masuk</label>
                            <input type="date" class="form-control" name="tahun_masuk" value="{{$edu->tahun_masuk}}">
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label">Tanggal Kelulusan</label>
                            <input type="date" class="form-control" name="tahun_lulus" value="{{$edu->tahun_lulus}}">
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label">Keterangan</label>
                            <textarea class="form-control" name="keterangan">{{$edu->keterangan}}</textarea>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 40px;">
                        <div class="col-lg-12 col-sm-12">
                            <button type="reset" class="btn btn-warning"> Reset</button>
                            <button type="submit" class="btn btn-primary"> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<div class="modal fade add-perjalanan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Tambah Data Pengalaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('employee.insert.sosmed',['insertExperience'])}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label">Nama Tempat </label>
                            <input type="hidden" name="employee_id" value="{{$data->id}}">
                            <input type="text" class="form-control" name="place" value="{{old('place')}}">
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label">Tanggal</label>
                            <input type="date" class="form-control" name="date" value="{{old('date')}}">
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label">Keterangan</label>
                            <textarea class="form-control" name="detail">{{old('detail')}}</textarea>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 40px;">
                        <div class="col-lg-12 col-sm-12">
                            <button type="reset" class="btn btn-warning"> Reset</button>
                            <button type="submit" class="btn btn-primary"> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@foreach($data->experience as $experience)
<div class="modal fade experience-update{{$experience->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Update Data Pengalaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('employee.insert.sosmed',['updateExperience'])}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label">Nama Tempat </label>
                            <input type="hidden" name="id" value="{{$experience->id}}">
                            <input type="text" class="form-control" name="place" value="{{$experience->place}}">
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label">Tanggal</label>
                            <input type="date" class="form-control" name="date" value="{{$experience->date}}">
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label">Keterangan</label>
                            <textarea class="form-control" name="detail">{{$experience->detail}}</textarea>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 40px;">
                        <div class="col-lg-12 col-sm-12">
                            <button type="reset" class="btn btn-warning"> Reset</button>
                            <button type="submit" class="btn btn-primary"> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<div class="modal fade add-gallery" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Tambah Gallery</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('employee.insert.sosmed',['insertGallery'])}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label">Caption Image </label>
                            <input type="hidden" name="employee_id" value="{{$data->id}}">
                            <input type="text" class="form-control" name="gallery_caption" value="{{old('gallery_caption')}}">
                        </div>

                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label">Image</label>
                            <input class="dropify" type="file" name="gallery_image" data-default-file="">
                        </div>

                    </div>
                    <div class="row" style="margin-top: 40px;">
                        <div class="col-lg-12 col-sm-12">
                            <button type="reset" class="btn btn-warning"> Reset</button>
                            <button type="submit" class="btn btn-primary"> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade delete-gallery" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Hapus Gallery</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('employee.insert.sosmed',['deleteGallery'])}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label">Pilih Gallery yang akan dihapus </label>
                            <select class="form-control" name="id">
                                <option value="">Pilih Gallery</option>
                                @foreach($data->gallery as $galdet)
                                <option value="{{$galdet->id}}">{{$galdet->gallery_caption}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 40px;">
                        <div class="col-lg-12 col-sm-12">
                            <button type="reset" class="btn btn-warning"> Reset</button>
                            <button type="submit" class="btn btn-danger"> Hapus Gallery</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>