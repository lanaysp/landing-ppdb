@extends('user.app_ppdb')
@section('content')
<div class="row">
    <div class="col-12 mt-3">

        <div class="card">
            <div class="card-body">
                <div class="pt-3">
                    <div class="settings-form">
                        @if($about == '')
                        <form action="{{route('change.pengguna.setting.ppdb')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Theme Color</label>
                                    <select class="form-control" name="theme_color">
                                        @foreach($insert['theme_color'] as $themecolor => $tc)
                                        <option value="{{$tc}}">{{$themecolor}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Theme Style</label>
                                    <select class="form-control" name="theme_style">
                                        @foreach($insert['theme_style'] as $themestyle => $ts)
                                        <option value="{{$ts}}">{{$themestyle}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Menu Style</label>
                                    <select class="form-control" name="theme_menu">
                                        @foreach($insert['theme_menu'] as $thememenu => $tm)
                                        <option value="{{$tm}}">{{$thememenu}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                        </form>
                        @else
                        <form action="{{route('change.pengguna.setting.ppdb')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Theme Color</label>
                                    <select class="form-control" name="theme_color">
                                        @foreach($insert['theme_color'] as $themecolor => $tc)
                                        <option value="{{$tc}}" <?= $tc == $about->theme_color ? 'selected' : null; ?>>{{$themecolor}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Theme Style</label>
                                    <select class="form-control" name="theme_style">
                                        @foreach($insert['theme_style'] as $themestyle => $ts)
                                        <option value="{{$ts}}" <?= $ts == $about->theme_style ? 'selected' : null; ?>>{{$themestyle}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Menu Style</label>
                                    <select class="form-control" name="theme_menu">
                                        @foreach($insert['theme_menu'] as $thememenu => $tm)
                                        <option value="{{$tm}}" <?= $tm == $about->theme_menu ? 'selected' : null; ?>>{{$thememenu}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection