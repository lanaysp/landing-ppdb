<div class="modal fade" id="add-feature" tabindex="-1" aria-labelledby="add-feature" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('cms.insert',['feature'])}}" method="post" enctype="multipart/form-data" class="modal-content">
            {{csrf_field()}}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Keunggulan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="titleFeature" class="col-form-label">Title Keunggulan :</label>
                    <input type="text" name="feature_title" value="{{old('feature_title')}}" class="form-control" id="titleFeature">
                </div>
                <div class="form-group">
                    <label for="descriptionFeature" class="col-form-label">Description Keunggulan:</label>
                    <textarea class="form-control" name="feature_description" id="descriptionFeature"> {{old('feature_description')}} </textarea>
                </div>
                <div class="form-group">
                    <label for="iconFeature" class="col-form-label">Icon Keunggulan :</label>
                    <input type="file" class="form-control" name="feature_icon" id="iconFeature">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambahkan Keunggulan</button>
            </div>
        </form>
    </div>
</div>

@foreach($data as $update)
<div class="modal fade" id="update-feature-{{$update->id}}" tabindex="-1" aria-labelledby="update-feature" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('cms.insert',['updatefeature'])}}" method="post" enctype="multipart/form-data" class="modal-content">
            {{csrf_field()}}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Keunggulan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="titleFeature" class="col-form-label">Title Keunggulan :</label>
                    <input type="hidden" name="id" value="{{$update->id}}">
                    <input type="text" name="feature_title" value="{{$update->feature_title}}" class="form-control" id="titleFeature">
                </div>
                <div class="form-group">
                    <label for="descriptionFeature" class="col-form-label">Description Keunggulan:</label>
                    <textarea class="form-control" name="feature_description" id="descriptionFeature"> {{$update->feature_description}} </textarea>
                </div>
                <div class="form-group">
                    <label for="iconFeature" class="col-form-label">Icon Keunggulan :</label>
                    <input type="file" class="form-control" name="feature_icon" id="iconFeature">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Keunggulan</button>
                <a class="btn btn-danger" href="{{route('cms.page',['deletefeature',$update->id])}}">Hapus Keunggulan</a>
            </div>
        </form>
    </div>
</div>
@endforeach