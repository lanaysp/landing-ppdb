@extends('backend.inc.app')
@section('content')
@section('style')
<link rel="stylesheet" href="{{my_asset('plugins/dropify/css/dropify.min.css')}}">
@endsection

<div class="row">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{$page}}</h4>
                </div>
                <form action="{{route('employee.insert')}}" enctype="multipart/form-data" method="post" class="card-body">
                {{csrf_field()}}
                    <div id="wizard_vertical">
                        <h2>General Information</h2>
                        <section>
                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Nama Awal</label>
                                        <input type="text" placeholder="Nama Awal" name="first_name" value="{{old('first_name')}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Nama Tengah</label>
                                        <input type="text" placeholder="Nama Tengah" name="middle_name" value="{{old('middle_name')}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Nama Akhir</label>
                                        <input type="text" placeholder="Nama Akhir" name="last_name" value="{{old('last_name')}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Nomor Ponsel</label>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-phone"></i>
                                            </div>
                                            <input type="number" placeholder="Nomor Ponsel" name="ponsel" value="{{old('ponsel')}}" class="form-control phone-number">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                @
                                            </div>
                                            <input type="text" placeholder="Username" name="username" value="{{old('username')}}" class="form-control phone-number">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" name="ttl" value="{{old('ttl')}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-control" name="jk">
                                            <option value="P">Perempuan</option>
                                            <option value="L">Laki - Laki</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Alamat Lengkap</label>
                                        <textarea class="form-control" name="alamat">{{old('alamat')}}</textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Photo</label>
                                        <input class="dropify" type="file" name="photo" data-default-file="{{my_asset(old('photo'))}}">
                                    </div>
                                </div>

                            </div>
                        </section>
                        <h2>Data Kenegaraan</h2>
                        <section>
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label>NIK ( * Nomor Induk KTP )</label>
                                        <input type="text" placeholder="320218050201001" name="nik" value="{{old('nik')}}" class="form-control ">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label>KK ( * Nomor Kartu Keluarga )</label>
                                        <input type="text" placeholder="320218050201001" name="kk" value="{{old('kk')}}" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Upload KTP</label>
                                        <input class="dropify" type="file" name="ktp" data-default-file="{{my_asset(old('ktp'))}}">
                                    </div>
                                </div>
                            </div>
                        </section>
                        <h2>Gaji</h2>
                        <section>
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Pilih Department</label>
                                        <select class="form-control" name="department">
                                            <option value="">Pilih Department</option>
                                            @foreach($dual as $department)
                                            <option value="{{$department->id}}">{{$department->department_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Pilih Designation</label>
                                        <select class="form-control" name="designation_id">
                                            <option value="">-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Besar Gaji Perbulan</label>
                                        <input type="number" class="form-control" name="salary">
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                    <button class="btn btn-primary pull-right" type="submit" style="margin-top: 20px;">
                        <i class="fa fa-plus"></i> Add Employee
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</section>
@section('script')
<script src="{{my_asset('plugins/jquery-validation/dist/jquery.validate.min.js')}}"></script>
<script src="{{my_asset('plugins/jquery-steps/jquery.steps.min.js')}}"></script>
<script src="{{my_asset('admin/theme/js/page/form-wizard.js')}}"></script>
<script src="{{my_asset('plugins/dropify/js/dropify.min.js')}}"></script>
<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();
    });
</script>

    <script>
        window.onload = function() {
            $("select[name='department']").change(function() {
                var url = "/administrator/master/employee/choosedesignation/" + $(this).val();
                $("select[name='designation_id']").load(url);
                return false;
            });
        };
    </script>
@endsection
@endsection