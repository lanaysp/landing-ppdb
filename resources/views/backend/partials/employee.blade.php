<div class="modal fade add-admin" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Tambah Data Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('insertAdm')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <label class="control-label"> Nama Admin</label>
                            <input type="text" class="form-control" name="name" placeholder="Nama Admin" value="{{old('name')}}">
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <label class="control-label"> Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Username" value="{{old('username')}}">
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label"> Email</label>
                            <input type="email" class="form-control" placeholder="Email " name="email" value="{{old('email')}}">
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label"> Ponsel</label>
                            <input type="number" class="form-control" placeholder="Number Ponsel" name="ponsel" value="{{old('ponsel')}}">
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label"> Jenis Kelamin</label>
                            <select class="form-control" name="jk">
                                <option value="1"> Pria </option>
                                <option value="2"> Wanita </option>
                            </select>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label"> Tanggal Lahir </label>
                            <input type="date" class="form-control" name="ttl" value="{{old('ttl')}}">
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label"> Role </label>
                            <select class="form-control" name="jk">
                                <option value="1"> Administrator </option>
                                <option value="2"> Keuangan </option>
                                <option value="3"> Perpustakaan </option>
                                <option value="4"> Sekretaris </option>
                                <option value="5"> Kesiswaan </option>
                                <option value="6"> BK </option>
                            </select>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <br>
                            <label class="control-label"> Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Alamat</label>
                            <textarea class="form-control" name="alamat"></textarea>
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <br>
                            <label class="control-label"> Photo</label>
                            <input type="file" class="form-control" name="photo">
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