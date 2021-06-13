<div class="modal fade" id="add" tabindex="-1" aria-labelledby="add-categori" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('cms.insert',['catnews'])}}" method="post" enctype="multipart/form-data" class="modal-content">
            {{csrf_field()}}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="cat_name" class="col-form-label">Nama Category :</label>
                    <input type="text" class="form-control" id="cat_name" name="cat_name" value="{{old('cat_name')}}">
                </div>
                <div class="form-group">
                    <label for="cat_icon" class="col-form-label">Icon Kategori :</label>
                    <input type="file" class="form-control" name="cat_icon" id="cat_icon">
                </div>
                <div class="form-group">
                    <label for="iconFeature" class="col-form-label">Status Kategori :</label>
                    <select class="form-control" name="cat_status">
                        <option value="1"> Aktif</option>
                        <option value="0"> Non Aktif</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambahkan Kategori</button>
            </div>
        </form>
    </div>
</div>
@foreach($data as $update)
<div class="modal fade" id="update{{$update->id}}" tabindex="-1" aria-labelledby="update-catnews" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('cms.insert',['updateCatnews'])}}" method="post" enctype="multipart/form-data" class="modal-content">
            {{csrf_field()}}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Kategori Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id" value="{{$update->id}}" <label for="cat_name" class="col-form-label">Nama Category :</label>
                    <input type="text" class="form-control" id="cat_name" name="cat_name" value="{{$update->cat_name}}">
                </div>
                <div class="form-group">
                    <label for="cat_icon" class="col-form-label">Icon Kategori :</label>
                    <input type="file" class="form-control" name="cat_icon" id="cat_icon">
                </div>
                <div class="form-group">
                    <label for="iconFeature" class="col-form-label">Status Kategori :</label>
                    <select class="form-control" name="cat_status">
                        @if($update->cat_status == 1)
                        <option value="1"> Aktif</option>
                        <option value="0"> Non Aktif</option>
                        @else
                        <option value="0"> Non Aktif</option>
                        <option value="1"> Aktif</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Kategori</button>
            </div>
        </form>
    </div>
</div>
@endforeach