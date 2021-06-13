<div class="modal fade" id="add-acrhivement" tabindex="-1" aria-labelledby="add-acrhivement" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('cms.insert',['acrhivement'])}}" method="post" enctype="multipart/form-data" class="modal-content">
            {{csrf_field()}}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Prestasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="archivement_name" class="col-form-label">Nama Prestasi :</label>
                    <input type="text" name="archivement_name" value="{{old('archivement_name')}}" class="form-control" id="archivement_name">
                </div>
                <div class="form-group">
                    <label for="archivement_date" class="col-form-label">Tanggal Prestasi :</label>
                    <input type="date" name="archivement_date" value="{{old('archivement_date')}}" class="form-control" id="archivement_date">
                </div>
                <div class="form-group">
                    <label for="archivement_note" class="col-form-label">Penjelasan Prestasi :</label>
                    <textarea class="summernote" name="archivement_note" id="archivement_note"> {{old('archivement_note')}} </textarea>
                </div>
                <div class="form-group">
                    <label for="archivement_photo" class="col-form-label">Photo Keunggulan :</label>
                    <input type="file" class="dropify" name="archivement_photo" id="archivement_photo" data-default-file="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambahkan Prestasi</button>
            </div>
        </form>
    </div>
</div>
@foreach($data as $update)
<div class="modal fade" id="updateArchivement{{$update->id}}" tabindex="-1" aria-labelledby="#update-archivement-{{$update->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('cms.insert',['prestasiUpdate'])}}" method="post" enctype="multipart/form-data" class="modal-content">
            {{csrf_field()}}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Prestasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="archivement_name" class="col-form-label">Nama Prestasi :</label>
                    <input type="hidden" name="id" value="{{$update->id}}">
                    <input type="text" name="archivement_name" value="{{$update->archivement_name}}" class="form-control" id="archivement_name">
                </div>
                <div class="form-group">
                    <label for="archivement_date" class="col-form-label">Tanggal Prestasi :</label>
                    <input type="date" name="archivement_date" value="{{$update->archivement_date}}" class="form-control" id="archivement_date">
                </div>
                <div class="form-group">
                    <label for="archivement_note" class="col-form-label">Penjelasan Prestasi :</label>
                    <textarea class="summernote" name="archivement_note" id="archivement_note"> {{$update->archivement_note}} </textarea>
                </div>
                <div class="form-group">
                    <label for="archivement_photo" class="col-form-label">Photo Keunggulan :</label>
                    <input type="file" class="dropify" name="archivement_photo" id="archivement_photo" data-default-file="{{my_asset($update->archivement_photo)}}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Prestasi</button>
                <a class="btn btn-danger" href="{{route('cms.page',['deletePrestasi',$update->id])}}"> Delete Prestasi</a>
            </div>
        </form>
    </div>
</div>
@endforeach