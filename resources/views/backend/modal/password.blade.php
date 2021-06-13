<div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="myLargeModalLabel">Ubah Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{route('change.password')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label for="password">Tuliskan Password Baru Anda</label>
                                <input type="password" class="form-control" name="password" id="password" aria-describedby="emailHelp" placeholder="Masukkan Password Baru">
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label for="password">Konfirmasi Password</label>
                                <input type="password" class="form-control" name="confirm" id="password" aria-describedby="emailHelp" placeholder="Konfirmasi Password Baru">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn  btn-primary">Ubah Password</button>
                </form>
            </div>
        </div>
    </div>
</div>