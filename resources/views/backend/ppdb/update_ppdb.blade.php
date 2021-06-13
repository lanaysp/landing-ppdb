@extends('backend.inc.app')
@section('style')
<link rel="stylesheet" href="{{my_asset('plugins/dropify/css/dropify.min.css')}}">
<link rel="stylesheet" href="{{my_asset('plugins/select2/dist/css/select2.min.css')}}">
@endsection
@section('content')
<div class="section-body">

    <div class="row">
        <div class="col-12 col-md-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="wizard mb-4">
                        <div class="connecting-line"></div>
                        <ul class="nav nav-tabs d-flex mb-3">
                            <li class="nav-item mr-auto justify-center">
                                <a class="nav-link position-relative round-tab text-sm-center text-left p-0 border-0" data-toggle="tab" href="#info_ppdb">
                                    <i data-feather="user-plus"></i>
                                    <small class="d-none d-md-block">Informasi Peserta PPDB</small>
                                </a>
                            </li>
                            <li class="nav-item mx-auto justify-center">
                                <a class="nav-link position-relative round-tab text-sm-center text-left p-0 border-0" data-toggle="tab" href="#info_wali">
                                    <i data-feather="users"></i>
                                    <small class="d-none d-md-block">Informasi Wali PPDB</small>
                                </a>
                            </li>
                            <li class="nav-item ml-auto justify-center">
                                <a class="nav-link position-relative round-tab text-sm-center text-left p-0 border-0" data-toggle="tab" href="#document">
                                    <i data-feather="file-text"></i>
                                    <small class="d-none d-md-block">Kelengkapan Document</small>
                                </a>
                            </li>
                            <li class="nav-item ml-auto justify-center">
                                <a class="nav-link position-relative round-tab text-sm-center text-left p-0 border-0" data-toggle="tab" href="#inf_document">
                                    <i data-feather="check-square"></i>
                                    <small class="d-none d-md-block">Finish</small>
                                </a>
                            </li>
                        </ul>

                        <form action="{{route('create.ppdb.admin','update')}}" method="POST" enctype="multipart/form-data" class="tab-content">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$data['ini']->id}}">
                            <div class="tab-pane fade active show" id="info_ppdb">
                                <div class="form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jenis_kelamin">Pilih Tahun Ajaran</label>
                                                <div class="input-group  mb-3">
                                                    <select class="form-control select2" name="tahun">
                                                        <option value="">Pilih Tahun Ajaran</option>
                                                        @foreach($data['tahun'] as $tahun)
                                                        <option value="{{$tahun->id}}">{{$tahun->nama_tahunajaran}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jenis_kelamin">Pilih Gelombang</label>
                                                <div class="input-group  mb-3">
                                                    <select class="form-control select2" name="gelombang">
                                                        <option value="{{$data['ini']->gelombang_id}}">{{$data['ini']->gelombang_daftar->nama_gelombang}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jenis_kelamin">Beasiswa ( Optional ) </label>
                                                <div class="input-group  mb-3">
                                                    <select class="form-control select2" name="beasiswa">
                                                        <option value="">Pilih Beasiswa</option>
                                                        @foreach($data['beasiswa'] as $beasiswa)
                                                        <option value="{{$beasiswa->id}}" <?= $beasiswa->id == $data['ini']->beasiswa_id ? 'selected' : null; ?>>{{$beasiswa->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jenis_kelamin">Include User ( Optional ) </label>
                                                <div class="input-group  mb-3">
                                                    <select class="form-control select2" name="user_id">
                                                        <option value="">Pilih Pengguna</option>
                                                        @foreach($data['user'] as $user)
                                                        <option value="{{$user->id}}" <?= $user->id == $data['ini']->user_id ? 'selected' : null; ?>>{{$user->first_name}} {{$user->middle_name}} {{$user->last_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama_lengkap">Nama Lengkap</label>
                                                <div class="input-group  mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="fas fa-id-card"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="nama_lengkap" value="{{$data['ini']->nama_lengkap}}" aria-label="nama_lengkap" required aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jenis_kelamin">Jenis kelamin</label>
                                                <div class="input-group  mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="fas fa-id-card"></i></span>
                                                    </div>
                                                    <select class="form-control" name="jenis_kelamin">
                                                        @if($data['ini']->jenis_kelamin == 'Pria')
                                                        <option value="Pria">Pria</option>
                                                        <option value="Wanita">Wanita</option>
                                                        @elseif($data['ini']->jenis_kelamin == 'Wanita')
                                                        <option value="Wanita">Wanita</option>
                                                        <option value="Pria">Pria</option>
                                                        @else
                                                        <option value="Pria">Pria</option>
                                                        <option value="Wanita">Wanita</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nik">NIS ( Nomor Induk Siswa) </label>
                                                <div class="input-group  mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="fas fa-id-badge"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="nik" value="{{$data['ini']->nik}}" aria-label="nik" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                                <div class="input-group  mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-transparent border-right-0"><i class="fas fa-calendar"></i></span>
                                                    </div>
                                                    <input type="date" class="form-control" name="tanggal_lahir" value="{{$data['ini']->tanggal_lahir}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="tempat_lahir">Tempat Lahir</label>
                                                <div class="input-group  mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-transparent border-right-0"><i class="fas fa-map-marker"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="tempat_lahir" value="{{$data['ini']->tempat_lahir}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="tempat_lahir">Alamat Asal </label>
                                                <textarea class="form-control" name="alamat_asal"> {{$data['ini']->alamat_asal}} </textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="tempat_lahir">Alamat Tinggal (Sekarang) </label>
                                                <textarea class="form-control" name="alamat_tinggal"> {{$data['ini']->alamat_tinggal}} </textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="transportasi_sekolah">Transportasi Kesekolah</label>
                                                <div class="input-group  mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-transparent border-right-0"><i class="fas fa-bus"></i></span>
                                                    </div>
                                                    <select class="form-control" name="transportasi_sekolah">
                                                        <option value="">Pilih</option>
                                                        @foreach($data['kendaraan'] as $kendaraan)
                                                        <option value="{{$kendaraan}}" <?= $kendaraan == $data['ini']->transportasi_sekolah ? 'selected' : null; ?>>{{$kendaraan}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="no_phone">No Phonsel </label>
                                                <div class="input-group  mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-transparent border-right-0"><i class="fas fa-mobile-alt"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control" name="no_phone" value="{{$data['ini']->no_phone}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="agama">Agama Dianut</label>
                                                <div class="input-group  mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-transparent border-right-0"><i class="fas fa-mosque"></i></span>
                                                    </div>
                                                    <select class="form-control" name="agama">
                                                        <option value="">Pilih</option>
                                                        @foreach($data['agama'] as $agama)
                                                        <option value="{{$agama}}" <?= $agama == $data['ini']->agama ? 'selected' : null; ?>>{{$agama}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nik">KPS (Jika Menerima ) </label>
                                                <div class="input-group  mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-transparent border-right-0"><i class="fas fa-money-check"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control" name="no_kps" value="{{$data['ini']->no_kps}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="nik">Berat Badan</label>
                                                <div class="input-group  mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-transparent border-right-0"><i class="fas fa-cubes"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control" name="berat_badan" value="{{$data['ini']->berat_badan}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="nik">Tinggi Badan</label>
                                                <div class="input-group  mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-transparent border-right-0"><i class="fas fa-child"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control" name="tinggi_badan" value="{{$data['ini']->tinggi_badan}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="nik">Jarak Kesekolah (Km)</label>
                                                <div class="input-group  mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-transparent border-right-0"><i class="fas fa-bus"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control" name="jakar_kesekolah" value="{{$data['ini']->jakar_kesekolah}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="nik">Anak ke ?</label>
                                                <div class="input-group  mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-transparent border-right-0"><i class="fas fa-user"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control" name="anak_ke" value="{{$data['ini']->anak_ke}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nik">Jumlah Saudara ( Kandung )</label>
                                                <div class="input-group  mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-transparent border-right-0"><i class="fas fa-users"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control" name="jumlah_saudara" value="{{$data['ini']->jumlah_saudara}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn float-right btn-primary nexttab">Selanjutnya</button>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="info_wali">
                                <div class="form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama_ayah">Nama Lengkap Ayah</label>
                                                <div class="input-group  mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="fas fa-user-tie"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="nama_ayah" value="{{$data['ini']->nama_ayah}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama_ibu">Nama Lengkap Ibu</label>
                                                <div class="input-group  mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="fas fa-user-circle"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="nama_ibu" value="{{$data['ini']->nama_ibu}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tanggal_lahir_ayah">Tanggal Lahir Ayah</label>
                                                <div class="input-group  mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="fas fa-calendar-check"></i></span>
                                                    </div>
                                                    <input type="date" class="form-control" name="tanggal_lahir_ayah" value="{{$data['ini']->tanggal_lahir_ayah}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tanggal_lahir_ibu">Tanggal Lahir Ibu</label>
                                                <div class="input-group  mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="fas fa-calendar-check"></i></span>
                                                    </div>
                                                    <input type="date" class="form-control" name="tanggal_lahir_ibu" value="{{$data['ini']->tanggal_lahir_ibu}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pendidikan_ayah">Pendidikan Terakhir Ayah</label>
                                                <div class="input-group  mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="fas fa-user-graduate"></i></span>
                                                    </div>
                                                    <select class="form-control" name="pendidikan_ayah">
                                                        <option value="">Pilih Pendidikan Terakhir</option>
                                                        @foreach($data['pendidikan'] as $pendidikan)
                                                        <option value="{{$pendidikan}}" <?= $pendidikan == $data['ini']->pendidikan_ayah ? 'selected' : null; ?>>{{$pendidikan}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pendidikan_ibu">Pendidikan Terakhir Ibu</label>
                                                <div class="input-group  mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="fas fa-user-graduate"></i></span>
                                                    </div>
                                                    <select class="form-control" name="pendidikan_ibu">
                                                        <option value="">Pilih Pendidikan Terakhir</option>
                                                        @foreach($data['pendidikan'] as $pendidikan)
                                                        <option value="{{$pendidikan}}" <?= $pendidikan == $data['ini']->pendidikan_ibu ? 'selected' : null; ?>>{{$pendidikan}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pekerjaan_ayah">Tuliskan Pekerjaan Ayah</label>
                                                <div class="input-group  mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="fas fa-user-shield"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="pekerjaan_ayah" value="{{$data['ini']->pekerjaan_ayah}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pekerjaan_ibu">Tuliskan Pekerjaan Ibu</label>
                                                <div class="input-group  mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="fas fa-user-nurse"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="pekerjaan_ibu" value="{{$data['ini']->pekerjaan_ibu}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="penghasilan_ayah">Penghasilan Rata-Rata Ayah</label>
                                                <div class="input-group  mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="fas fa-money-bill-wave"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="penghasilan_ayah" value="{{$data['ini']->penghasilan_ayah}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="penghasilan_ibu">Penghasilan Rata-Rata Ibu</label>
                                                <div class="input-group  mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="fas fa-money-bill-wave"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="penghasilan_ibu" value="{{$data['ini']->penghasilan_ibu}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="keterangan_ayah">Keterangan Ayah</label>
                                                <div class="input-group  mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="fas fa-user-check"></i></span>
                                                    </div>
                                                    <select class="form-control" name="keterangan_ayah">
                                                        @if($data['ini']->keterangan_ayah == 'Hidup' || $data['ini']->keterangan_ayah == null)
                                                        <option value="Hidup">Masih Hidup</option>
                                                        <option value="Wafat">Wafat</option>
                                                        @else
                                                        <option value="Wafat">Wafat</option>
                                                        <option value="Hidup">Masih Hidup</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="keterangan_ibu">Keterangan Ibu</label>
                                                <div class="input-group  mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="fas fa-user-check"></i></span>
                                                    </div>
                                                    <select class="form-control" name="keterangan_ibu">
                                                        @if($data['ini']->keterangan_ibu == 'Hidup' || $data['ini']->keterangan_ibu == null)
                                                        <option value="Hidup">Masih Hidup</option>
                                                        <option value="Wafat">Wafat</option>
                                                        @else
                                                        <option value="Wafat">Wafat</option>
                                                        <option value="Hidup">Masih Hidup</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="tempat_lahir">Alamat Orangtua Sekarang </label>
                                                <textarea class="form-control" name="alamat_tinggal_ortu"> {{$data['ini']->alamat_tinggal_ortu}}} </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <button type="button" class="btn btn-primary prevtab">Sebelumnya</button>
                                        <button type="button" class="btn btn-primary nexttab ml-auto">Selanjutnya</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="document">
                                <div class="form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="photo">Photo 3 x 4 / ( Hitam Putih)</label>
                                                <input class="dropify" type="file" id="photo" name="photo" data-default-file="{{my_asset($data['ini']->photo)}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="akta_kelahiran">Akta Kelahiran ( Scan & Upload ) </label>
                                                <input class="dropify" type="file" id="akta_kelahiran" name="akta_kelahiran" data-default-file="{{my_asset($data['ini']->akta_kelahiran)}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="kartu_keluarga">Kartu Keluarga ( Scan & Upload ) </label>
                                                <input class="dropify" type="file" id="kartu_keluarga" name="kartu_keluarga" data-default-file="{{my_asset($data['ini']->kartu_keluarga)}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ijazah_sekolah">Izajah Terakhir Sekolah ( Scan & Upload ) </label>
                                                <input class="dropify" type="file" id="ijazah_sekolah" name="ijazah_sekolah" data-default-file="{{my_asset($data['ini']->ijazah_sekolah)}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="kps_kks">Surat KPS / KKS ( Scan & Upload ) </label>
                                                <input class="dropify" type="file" id="kps_kks" name="kps_kks" data-default-file="{{my_asset($data['ini']->kps_kks)}}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="alasan_memilik_sekolah">Alasan Ingin Sekolah Di </label>
                                                <textarea class="form-control" name="alasan_memilik_sekolah"> {{$data['ini']->alasan_memilik_sekolah}} </textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="hal_diketahui">Pendapatmu Soal Sekolah yang didengar diluar </label>
                                                <textarea class="form-control" name="hal_diketahui">  {{$data['ini']->hal_diketahui}} </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <button type="button" class="btn btn-primary prevtab">Sebelumnya</button>
                                        <button type="button" class="btn btn-primary nexttab ml-auto">Selanjutnya</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="inf_document">

                                <div class="form p-5 text-center">
                                    <h3>Selesai !</h3>
                                    <p>Dengan Meng-klik Tombol Kirim Dibawah ini, Seluruh Data Akan masuk ke Daftar PPDB Sesuai dengan tahun dan gelombang yang dipilih </p>
                                    <button type="submit" class="btn btn-primary">Kirimkan Registrasi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@section('script')
<script src="{{my_asset('admin/users/vendors/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{my_asset('admin/users/js/app.js')}}"></script>
<script src="{{my_asset('plugins/dropify/js/dropify.min.js')}}"></script>
<script src="{{my_asset('plugins/select2/dist/js/select2.full.min.js')}}"></script>
<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();
    });

    window.onload = function() {
        $("select[name='tahun']").change(function() {
            var url = "/administrator/ppdb/registration/get-gelombang/" + $(this).val();
            $("select[name='gelombang']").load(url);
            return false;
        });
    };
</script>
@endsection
@endsection