<div class="modal fade" id="add-history" tabindex="-1" aria-labelledby="add-history" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('cms.insert',['history'])}}" method="post" enctype="multipart/form-data" class="modal-content">
            {{csrf_field()}}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah History Sekolah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="form-group">
                            <label for="title" class="col-form-label">Title :</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="start_date" class="col-form-label">Start Date :</label>
                            <input type="date" class="form-control" name="start_date" value="{{old('start_date')}}" id="start_date">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="end_date" class="col-form-label">End Date :</label>
                            <input type="date" class="form-control" name="end_date" value="{{old('end_date')}}" id="end_date">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="iconFeature" class="col-form-label">Status Kategori :</label>
                            <textarea class="form-control" name="description">{{old('description')}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambahkan Sejarah</button>
            </div>
        </form>
    </div>
</div>
@foreach($data as $update)
<div class="modal fade" id="update{{$update->id}}" tabindex="-1" aria-labelledby="update-history" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('cms.insert',['historyUpdate'])}}" method="post" enctype="multipart/form-data" class="modal-content">
            {{csrf_field()}}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update History Sekolah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="form-group">
                            <label for="title" class="col-form-label">Title :</label>
                            <input type="hidden" name="id" value="{{$update->id}}">
                            <input type="text" class="form-control" id="title" name="title" value="{{$update->title}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="start_date" class="col-form-label">Start Date :</label>
                            <input type="date" class="form-control" name="start_date" value="{{$update->start_date}}" id="start_date">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="end_date" class="col-form-label">End Date :</label>
                            <input type="date" class="form-control" name="end_date" value="{{$update->end_date}}" id="end_date">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="iconFeature" class="col-form-label">Status Kategori :</label>
                            <textarea class="form-control" name="description">{{$update->description}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Sejarah</button>
            </div>
        </form>
    </div>
</div>
@endforeach