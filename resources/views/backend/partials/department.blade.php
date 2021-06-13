<div class="modal fade add-department" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Tambah Data Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('department.insert')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Nama Department</label>
                            <input type="text" class="form-control" placeholder="Nama Department " name="department_name" value="{{old('department_name')}}">
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
<div class="modal fade edit-department-{{$update->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Update Data Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('department.update')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Nama Department</label>
                            <input type="hidden" name="id" value="{{$update->id}}">
                            <input type="text" class="form-control" name="department_name" value="{{$update->department_name}}">
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