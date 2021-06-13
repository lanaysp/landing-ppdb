<div class="modal fade add-designation" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Tambah Data Designation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('designation.insert')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label"> Pilih Department</label>
                            <select class="form-control" name="department_id">
                                <option value=""> Pilih Department </option>
                                @foreach($part as $q1)
                                <option value="{{$q1->id}}">{{$q1->department_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label"> Nama Designation</label>
                            <input type="text" class="form-control" name="designation_name" value="{{old('designation_name')}}">
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
<div class="modal fade edit-designation-{{$update->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Update Data Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('designation.update')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label"> Pilih Department</label>
                            <select class="form-control" name="department_id">
                                @foreach($part as $q1)
                                <option value="{{$q1->id}}" <?= $q1->id == $update->department_id ? 'selected' : null; ?>>{{$q1->department_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label"> Nama Designation</label>
                            <input type="hidden" name="id" value="{{$update->id}}">
                            <input type="text" class="form-control" name="designation_name" value="{{$update->designation_name}}">
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