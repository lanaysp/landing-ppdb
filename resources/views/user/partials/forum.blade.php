<div class="modal fade" id="add">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="icon-pencil"></i> Buat Forum Diskusi
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="icon-close"></i>
                </button>
            </div>
            <form class="add-note-form" action="{{route('ppdb.add_forum')}}" method="POST">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title" class="col-form-label">Judul</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-form-label">Isi</label>
                        <textarea class="form-control" rows="10" name="description" required></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary add-todo">Publish Mading</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach($data as $update)
<div class="modal fade" id="edit-{{$update->id}}">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="icon-pencil"></i> Update Forum Diskusi
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="icon-close"></i>
                </button>
            </div>
            <form class="add-note-form" action="{{route('ppdb.update_forum')}}" method="POST">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title" class="col-form-label">Judul</label>
                        <input type="text" name="title" class="form-control" value="{{$update->title}}" required>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-form-label">Isi</label>
                        <input type="hidden" name="id" value="{{encrypt($update->id)}}">
                        <textarea class="form-control" rows="10" name="description" required>{{$update->description}}</textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary add-todo">Publish Mading</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach