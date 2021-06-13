@extends('backend.inc.app')
@section('content')
@section('style')
<link rel="stylesheet" href="{{my_asset('plugins/dropify/css/dropify.min.css')}}">
@endsection
<div class="row">
    <div class="col-12">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>{{$page}}</h4>
                            <br>
                            <form enctype="multipart/form-data" method="post" action="{{route('settings.post',['website'])}}" class="forms-sample">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="control-label">Tampilkan Data Guru</div>
                                            <div class="custom-switches-stacked mt-2">
                                                <label class="custom-switch">
                                                    <input type="radio" name="teacher_appear" value="1" class="custom-switch-input" @if($data->teacher_appear == 1) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Iya</span>
                                                </label>
                                                <label class="custom-switch">
                                                    <input type="radio" name="teacher_appear" value="0" class="custom-switch-input" @if($data->teacher_appear == 0) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Tidak</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="control-label">Tampilkan Halaman Kontak</div>
                                            <div class="custom-switches-stacked mt-2">
                                                <label class="custom-switch">
                                                    <input type="radio" name="contact_appear" value="1" class="custom-switch-input" @if($data->contact_appear == 1) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Iya</span>
                                                </label>
                                                <label class="custom-switch">
                                                    <input type="radio" name="contact_appear" value="0" class="custom-switch-input" @if($data->contact_appear == 0) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Tidak</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="control-label">Tampilkan Halaman Fasilitas</div>
                                            <div class="custom-switches-stacked mt-2">
                                                <label class="custom-switch">
                                                    <input type="radio" name="facility_appear" value="1" class="custom-switch-input" @if($data->facility_appear == 1) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Iya</span>
                                                </label>
                                                <label class="custom-switch">
                                                    <input type="radio" name="facility_appear" value="0" class="custom-switch-input" @if($data->facility_appear == 0) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Tidak</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="control-label">Tampilkan Tentang Sekolah</div>
                                            <div class="custom-switches-stacked mt-2">
                                                <label class="custom-switch">
                                                    <input type="radio" name="about_appear" value="1" class="custom-switch-input" @if($data->about_appear == 1) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Iya</span>
                                                </label>
                                                <label class="custom-switch">
                                                    <input type="radio" name="about_appear" value="0" class="custom-switch-input" @if($data->about_appear == 0) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Tidak</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="control-label">Tampilkan Gallery Sekolah</div>
                                            <div class="custom-switches-stacked mt-2">
                                                <label class="custom-switch">
                                                    <input type="radio" name="gallery_appear" value="1" class="custom-switch-input" @if($data->gallery_appear == 1) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Iya</span>
                                                </label>
                                                <label class="custom-switch">
                                                    <input type="radio" name="gallery_appear" value="0" class="custom-switch-input" @if($data->gallery_appear == 0) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Tidak</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="control-label">Tampilkan Halaman Kegiatan</div>
                                            <div class="custom-switches-stacked mt-2">
                                                <label class="custom-switch">
                                                    <input type="radio" name="activity_appear" value="1" class="custom-switch-input" @if($data->activity_appear == 1) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Iya</span>
                                                </label>
                                                <label class="custom-switch">
                                                    <input type="radio" name="activity_appear" value="0" class="custom-switch-input" @if($data->activity_appear == 0) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Tidak</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- <div class="col-6">
                                        <div class="form-group">
                                            <div class="control-label">Tampilkan Halaman Kreativitas</div>
                                            <div class="custom-switches-stacked mt-2">
                                                <label class="custom-switch">
                                                    <input type="radio" name="creativity_appear" value="1" class="custom-switch-input" @if($data->creativity_appear == 1) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Iya</span>
                                                </label>
                                                <label class="custom-switch">
                                                    <input type="radio" name="creativity_appear" value="0" class="custom-switch-input" @if($data->creativity_appear == 0) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Tidak</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div> -->

                                    <!-- <div class="col-6">
                                        <div class="form-group">
                                            <div class="control-label">Tampilkan Halaman Mading</div>
                                            <div class="custom-switches-stacked mt-2">
                                                <label class="custom-switch">
                                                    <input type="radio" name="board_appear" value="1" class="custom-switch-input" @if($data->board_appear == 1) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Iya</span>
                                                </label>
                                                <label class="custom-switch">
                                                    <input type="radio" name="board_appear" value="0" class="custom-switch-input" @if($data->board_appear == 0) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Tidak</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div> -->


                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="control-label">Tampilkan Halaman Berita</div>
                                            <div class="custom-switches-stacked mt-2">
                                                <label class="custom-switch">
                                                    <input type="radio" name="news_appear" value="1" class="custom-switch-input" @if($data->news_appear == 1) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Iya</span>
                                                </label>
                                                <label class="custom-switch">
                                                    <input type="radio" name="news_appear" value="0" class="custom-switch-input" @if($data->news_appear == 0) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Tidak</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="control-label">Tampilkan Halaman Mapel</div>
                                            <div class="custom-switches-stacked mt-2">
                                                <label class="custom-switch">
                                                    <input type="radio" name="subject_appear" value="1" class="custom-switch-input" @if($data->subject_appear == 1) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Iya</span>
                                                </label>
                                                <label class="custom-switch">
                                                    <input type="radio" name="subject_appear" value="0" class="custom-switch-input" @if($data->subject_appear == 0) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Tidak</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="control-label">Tampilkan Halaman Ekstrakulikuler</div>
                                            <div class="custom-switches-stacked mt-2">
                                                <label class="custom-switch">
                                                    <input type="radio" name="extra_appear" value="1" class="custom-switch-input" @if($data->extra_appear == 1) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Iya</span>
                                                </label>
                                                <label class="custom-switch">
                                                    <input type="radio" name="extra_appear" value="0" class="custom-switch-input" @if($data->extra_appear == 0) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Tidak</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="control-label">Tampilkan Halaman Prestasi</div>
                                            <div class="custom-switches-stacked mt-2">
                                                <label class="custom-switch">
                                                    <input type="radio" name="prestation_appear" value="1" class="custom-switch-input" @if($data->prestation_appear == 1) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Iya</span>
                                                </label>
                                                <label class="custom-switch">
                                                    <input type="radio" name="prestation_appear" value="0" class="custom-switch-input" @if($data->prestation_appear == 0) checked @endif>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Tidak</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="metatitle">Logo Sekolah</label>
                                            <input class="dropify" type="file" name="website_logo" data-default-file="{{my_asset($data->website_logo)}}">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="metatitle">Dark Logo</label>
                                            <input class="dropify" type="file" name="dark_logo" data-default-file="{{my_asset($data->dark_logo)}}">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="footer_text">Text Footer</label>
                                            <textarea class="form-control" id="footer_text" name="footer_text">{{$data->footer_text}}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="copy_right">Copyright Text</label>
                                            <br>
                                            <input id="copy_right" type="text" name="copy_right" value="{{$data->copy_right}}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="facebook">Facebook Sekolah</label>
                                            <br>
                                            <input id="facebook" type="text" name="facebook" value="{{$data->facebook}}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="twitter">Twitter Sekolah</label>
                                            <br>
                                            <input id="twitter" type="text" name="twitter" value="{{$data->twitter}}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="instagram">Instagram Sekolah</label>
                                            <br>
                                            <input id="facebook" type="text" name="instagram" value="{{$data->instagram}}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="metatitle">Meta Title</label>
                                            <br>
                                            <input id="metatitle" name="meta_tittle" value="{{$data->meta_tittle}}" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="metatitle">Website Style</label>
                                            <br>
                                            <select class="form-control" name="theme">
                                                @if($data->theme == 'theme')
                                                <option value="theme">Modern Style</option>
                                                <option value="theme2">Classic Style</option>
                                                @elseif($data->theme == 'theme2')
                                                <option value="theme2">Classic Style</option>
                                                <option value="theme">Modern Style</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="metaKeyword">Meta Keyword</label>
                                            <br>
                                            <input id="metaKeyword" name="meta_keyword" value="{{$data->meta_keyword}}" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="meta_description">Meta Description</label>
                                            <textarea class="form-control" id="meta_description" name="meta_description"> {{$data->meta_description}} </textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="school_address">Alamat Sekolah</label>
                                            <textarea class="form-control" id="school_address" name="school_address"> {{$data->school_address}} </textarea>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="school_phone">Nomor Ponsel Sekolah</label>
                                            <br>
                                            <input id="school_phone" name="school_phone" value="{{$data->school_phone}}" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="school_email">Email Sekolah</label>
                                            <br>
                                            <input id="school_email" name="school_email" value="{{$data->school_email}}" type="email" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success mr-2">Simpan Pengaturan</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
</section>
@section('script')
<script src="{{my_asset('plugins/dropify/js/dropify.min.js')}}"></script>
<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();
    });
</script>
@endsection
@endsection