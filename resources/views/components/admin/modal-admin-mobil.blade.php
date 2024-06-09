{{-- Modal Tambah Mobil --}}
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog modal-default">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Mobil</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.mobil.tambah')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_mobil">Nama Mobil</label>
                            <input type="text" class="form-control" id="nama_mobil"
                                placeholder="ex Avanza Toyota">
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-dollar-sign"></i>
                                    </span>
                                </div>
                                <input type="number" class="form-control" id="harga_sewa" placeholder="Harga Sewa">
                                <div class="input-group-append">
                                    <div class="input-group-text"><i class="fas fa-check"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Kendaraan</label>
                            <textarea class="form-control" id="deskripsi" rows="3" placeholder="Enter ..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Foto Kendaraan</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="gambar">
                                    <label class="custom-file-label" for="gambar">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                    </div>


            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

{{-- Modal Edit Data Mobil --}}

<div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Mobil</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 d-flex justify-content-center align-items-center">
                        {{-- foto mobil --}}
                        <img src="https://cdn.motor1.com/images/mgl/MkO9NN/s1/future-supercars.webp"
                            class="img-fluid overflow-hidden rounded-sm" alt="Responsive image">

                    </div>
                    <div class="col-md-6">
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Mobil</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        placeholder="ex Avanza Toyota">
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-dollar-sign"></i>
                                            </span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="Harga Sewa">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fas fa-check"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi Kendaraan</label>
                                    <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Foto Kendaraan</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose
                                                file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


{{-- Modal Hapus data Mobil --}}

<div class="modal fade" id="modal-hapus">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus data Mobil</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus data? &hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger">Hapus Data</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
