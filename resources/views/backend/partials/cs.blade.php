<div class="modal fade add-cs" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Tambah Data cs</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.add_cs')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label">Pilih Pegawai</label>
                            <select class="form-control" name="user_id">
                                @foreach($pengguna as $pp)
                                <option value="{{$pp->id ?? ''}}" <?= $pp->id ?? '' == old('user_id') ? 'selected' : null; ?>>{{$pp->employee->first_name ?? ''}} {{$pp->employee->last_name ?? ''}} </option>
                                @endforeach 
                            </select>
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label">Phone (Whatsapp) </label>
                            <input type="number" value="{{old('phone')}}" class="form-control" name="phone">
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label">Sapaan </label>
                            <input type="hidden" name="status" value="1">
                            <input type="text" value="{{old('sapaan')}}" class="form-control" name="sapaan">
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
<div class="modal fade edit-cs-{{$update->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Update Data cs</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.update_cs')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$update->id}}">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label">Pilih Pegawai</label>
                            <select class="form-control" name="user_id">
                                @foreach($pengguna as $pp)
                                <option value="{{$pp->id}}" <?= $pp->id == $update->user_id ? 'selected' : null; ?>>{{$pp->employee->first_name}} {{$pp->employee->last_name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label">Phone (Whatsapp) </label>
                            <input type="number" value="{{$update->phone}}" class="form-control" name="phone">
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label">Sapaan </label>
                            <input type="hidden" name="status" value="1">
                            <input type="text" value="{{$update->sapaan}}" class="form-control" name="sapaan">
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