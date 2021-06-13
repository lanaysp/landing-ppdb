<div class="modal fade add-slider" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Tambah Slider</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('cms.insert',['slider'])}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Slider Title </label>
                            <input type="text" class="form-control" placeholder="Title Slider " name="title_slider" value="{{old('title_slider')}}">
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Slider Title </label>
                            <textarea name="subtitle_slider" class="form-control">{{old('subtitle_slider')}}</textarea>
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Slider Image </label>
                            <input class="dropify" type="file" name="image_slider" data-default-file="{{my_asset(old('image_slider'))}}">
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
<div class="modal fade update-slider{{$update->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Edit Slider</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('cms.insert',['sliderUpdate'])}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Slider Title </label>
                            <input type="hidden" name="id" value="{{$update->id}}">
                            <input type="text" class="form-control" placeholder="Title Slider " name="title_slider" value="{{$update->title_slider}}">
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Slider Title </label>
                            <textarea name="subtitle_slider" class="form-control">{{$update->subtitle_slider}}</textarea>
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Slider Image </label>
                            <input class="dropify" type="file" name="image_slider" data-default-file="{{my_asset($update->image_slider)}}">
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