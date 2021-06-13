@extends('backend.inc.app')
@section('content')
<div class="section-body">
    <div class="card note">
        <div class="card-body">
            <div class="page-content note-has-grid">
                <ul class="nav nav-pills p-3 mb-3 rounded-pill align-items-center">
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link rounded-pill note-link d-flex align-items-center px-2 px-md-3 mr-0 mr-md-2 active" id="all-category">
                            <i data-feather="check-circle"></i><span class="d-md-block">Semua Mading</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link rounded-pill note-link d-flex align-items-center px-2 px-md-3 mr-0 mr-md-2" id="pendidikan"> <i data-feather="book"></i><span class="d-md-block">Pendidikan</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link rounded-pill note-link d-flex align-items-center px-2 px-md-3 mr-0 mr-md-2" id="bisnis"> <i data-feather="briefcase"></i><span class="d-md-block">Bisnis</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link rounded-pill note-link d-flex align-items-center px-2 px-md-3 mr-0 mr-md-2" id="experience"> <i data-feather="star"></i><span class="d-md-block">Experience</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link rounded-pill note-link d-flex align-items-center px-2 px-md-3 mr-0 mr-md-2" id="social"> <i data-feather="users"></i><span class="d-md-block">Social</span></a>
                    </li>
                    <li class="nav-item ml-auto">
                        <a href="#" class="btn btn-icon icon-left btn-dark rounded-pill" id="add-notes"><i class="fas fa-plus"></i> Tambahkan Mading</a>
                    </li>
                </ul>
                <div class="tab-content bg-transparent">
                    <div id="note-full-container" class="note-has-grid row">
                        @foreach($data as $mading)
                        <div class="col-md-4 single-note-item all-category {{$mading->label}}">
                            <div class="note-card note-card-body note-bg-green">
                                <span class="side-stick"></span>
                                <div class="note-header">
                                    <h5 class="note-title text-truncate w-75 mb-0" data-noteheading="{{$mading->title}}">{{$mading->title}}</h5>
                                    <div class="text-right w-25">
                                        <a href="{{route('admin.ppdb.madingdel',encrypt($mading->id))}}" style="color: black;" class="tombolhapus"> <span class="mr-1"><i class="far fa-trash-alt remove-note font-17"></i></span></a>
                                    </div>
                                </div>
                                @if($mading->posting->type_account == 'ppdb')
                                <p class="note-date font-12">{{$mading->created_at}} - Ditambahkan Oleh <b>{{$mading->posting->first_name}} {{$mading->posting->middle_name}} {{$mading->posting->last_name}}</b> </p>
                                @else
                                <p class="note-date font-12">{{$mading->created_at}} - Ditambahkan Oleh <b>{{$mading->posting->employee->first_name}} {{$mading->posting->employee->middle_name}} {{$mading->posting->employee->last_name}}</b> </p>
                                @endif
                                <div class="note-content">
                                    <p class="note-inner-content" data-notecontent=" {{$mading->description}} ">
                                        {{$mading->description}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                {{$data->links()}}
            </div>
        </div>
    </div>
</div>

</div>
</section>
<div class="modal fade" id="addnotesmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambahkan Mading</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" action="{{route('admin.mading.create','create')}}" method="POST">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="note-title">
                                <label>Judul</label>
                                <input type="text" id="note-has-title" class="form-control" name="title" minlength="5" placeholder="Judul" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="note-description">
                                <label>Isi Mading</label>
                                <textarea id="note-has-description" name="description" class="form-control" minlength="60" placeholder="Isi Mading" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="title" class="col-form-label">Kategori</label>
                            <select class="form-control" id="type" name="label">
                                <option value="pendidikan">Pendidikan</option>
                                <option value="bisnis">Bisnis</option>
                                <option value="pengalaman">Pengalaman</option>
                                <option value="social">Social</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer bg-whitesmoke mt-3">
                        <button type="submit" class="btn btn-success">Publish Mading</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@section('script')
<script src="{{my_asset('admin/theme/js/page/note.js')}}"></script>
@endsection
@endsection