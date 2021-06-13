<div class="modal fade add-admin" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Tambah Data Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('user.admin.add')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">

                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label"> Pilih Pegawai </label>
                            <select class="form-control" name="employee_id">
                                <option value=""> Pilih Pegawai </option>
                                @foreach($empl as $emp)
                                <option value="{{$emp->id}}"> {{$emp->first_name}} - {{$emp->username}} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label"> Role Users </label>
                            <select class="form-control" name="role">
                                <option value="1"> Administrator </option>
                                <option value="2"> Keuangan </option>
                                <option value="3"> Perpustakaan </option>
                                <option value="4"> Sekretaris </option>
                                <option value="5"> Kesiswaan </option>
                                <option value="6"> BK </option>
                            </select>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label"> Email</label>
                            <input type="email" class="form-control" placeholder="Email " name="email" value="{{old('email')}}">
                        </div>




                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label"> Password</label>
                            <input type="password" class="form-control" name="password">
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

@foreach($data as $update)
<div class="modal fade update-user-{{$update->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Update Data Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('user.admin.update')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">

                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label"> Pilih Pegawai </label>
                            <input type="hidden" name="id" value="{{$update->id}}">
                            <select class="form-control" name="employee_id">
                                @foreach($empl as $emp)
                                <option value="{{$emp->id}}" <?= $emp->id == $update->employee_id ? 'selected' : null; ?>> {{$emp->first_name}} - {{$emp->username}} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label"> Role Users </label>
                            <select class="form-control" name="role">
                                <option value="1"> Administrator </option>
                                <option value="2"> Keuangan </option>
                                <option value="3"> Perpustakaan </option>
                                <option value="4"> Sekretaris </option>
                                <option value="5"> Kesiswaan </option>
                                <option value="6"> BK </option>
                            </select>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label"> Email</label>
                            <input type="email" class="form-control" placeholder="Email " name="email" value="{{$update->email}}">
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label"> Password</label>
                            <input type="password" class="form-control" name="password">
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