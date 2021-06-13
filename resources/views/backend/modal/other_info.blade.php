<div class="modal fade" id="add-petunjuk" tabindex="-1" aria-labelledby="add-petunjuk" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('admin.insert.other_info')}}" method="post" enctype="multipart/form-data" class="modal-content">
            {{csrf_field()}}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Info Lainnya</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="title" class="col-form-label">Judul Info :</label>
                    <input type="text" name="title" value="{{old('title')}}" class="form-control" id="title">
                </div>
                <div class="form-group">
                    <label for="description" class="col-form-label">Detail Petunjuk :</label>
                    <textarea class="form-control" name="description" id="description"> {{old('description')}} </textarea>
                </div>
                <div class="form-group">
                    <label for="status" class="col-form-label">Status</label>
                    <select class="form-control" name="status" id="status">
                        <option value="1">Aktif</option>
                        <option value="0">Tidak</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambahkan Info</button>
            </div>
        </form>
    </div>
</div>
@foreach($data as $update)
<div class="modal fade" id="update-petunjuk-{{$update->id}}" tabindex="-1" aria-labelledby="#update-archivement-{{$update->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('admin.update.other')}}" method="post" enctype="multipart/form-data" class="modal-content">
            {{csrf_field()}}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="title" class="col-form-label">Judul Info :</label>
                    <input type="text" name="title" value="{{$update->title}}" class="form-control" id="title">
                </div>
                <div class="form-group">
                    <label for="description" class="col-form-label">Detail Petunjuk :</label>
                    <input type="hidden" name="id" value="{{$update->id}}">
                    <textarea class="form-control" name="description" id="description"> {{$update->description}} </textarea>
                </div>
                <div class="form-group">
                    <label for="status" class="col-form-label">Status</label>
                    <select class="form-control" name="status" id="status">
                        <option value="1">Aktif</option>
                        <option value="0">Tidak</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Petunjuk</button>
                <a class="btn btn-danger" href="{{route('admin.delte.other_info',$update->id)}}"> Delete Info</a>
            </div>
        </form>
    </div>
</div>
@endforeach