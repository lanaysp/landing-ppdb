<div class="modal fade add" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Tambah Gallery</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('cms.insert',['gallery'])}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Gallery Caption </label>
                            <input type="text" class="form-control" placeholder="Nama Caption" name="caption_name" value="{{old('caption_name')}}">
                        </div>

                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Gallery Image </label>
                            <input class="dropify" type="file" name="image" data-default-file="{{my_asset(old('image'))}}">
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

<div class="modal fade update" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Update Gallery</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('cms.insert',['updateGallery'])}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Gallery Caption </label>
                            <input type="text" class="form-control" placeholder="Nama Caption" name="caption_name" value="{{old('caption_name')}}">
                        </div>

                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Gallery Image </label>
                            <input class="dropify" type="file" name="image" data-default-file="{{my_asset(old('image'))}}">
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Pilih Gallery ( Yang Akan Diubah ) </label>
                            <select class="form-control" name="id">
                                @foreach($data as $update)
                                <option value="{{$update->id}}">{{$update->caption_name}}</option>
                                @endforeach
                            </select>
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

<div class="modal fade delete" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Hapus Gallery</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('cms.insert',['deleteGallery'])}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Pilih Gallery ( Yang Akan Dihapus ) </label>
                            <select class="form-control" name="id">
                                @foreach($data as $delete)
                                <option value="{{$delete->id}}">{{$delete->caption_name}}</option>
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