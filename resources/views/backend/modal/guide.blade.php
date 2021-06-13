<div class="modal fade" id="add-petunjuk" tabindex="-1" aria-labelledby="add-petunjuk" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('admin.add_guide')}}" method="post" enctype="multipart/form-data" class="modal-content">
            {{csrf_field()}}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Petunjuk Pendaftaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="title" class="col-form-label">Judul Petunjuk :</label>
                    <input type="text" name="title" value="{{old('title')}}" class="form-control" id="title">
                </div>
                <div class="form-group">
                    <label for="description" class="col-form-label">Detail Petunjuk :</label>
                    <textarea class="form-control" name="description" id="description"> {{old('description')}} </textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambahkan Petunjuk</button>
            </div>
        </form>
    </div>
</div>
@foreach($data as $update)
<div class="modal fade" id="update-petunjuk-{{$update->id}}" tabindex="-1" aria-labelledby="#update-archivement-{{$update->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('admin.update_guide')}}" method="post" enctype="multipart/form-data" class="modal-content">
            {{csrf_field()}}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Prestasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="title" class="col-form-label">Judul Petunjuk :</label>
                    <input type="text" name="title" value="{{$update->title}}" class="form-control" id="title">
                </div>
                <div class="form-group">
                    <label for="description" class="col-form-label">Detail Petunjuk :</label>
                    <input type="hidden" name="id" value="{{$update->id}}">
                    <textarea class="form-control" name="description" id="description"> {{$update->description}} </textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Petunjuk</button>
                <a class="btn btn-danger" href="{{route('admin.delete_guide',$update->id)}}"> Delete Petunjuk</a>
            </div>
        </form>
    </div>
</div>
@endforeach
