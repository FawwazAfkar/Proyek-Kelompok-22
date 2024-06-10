{{-- Modal Edit Data Mobil --}}
@props(['mobil'])
<div class="modal fade" id='edit{{ $mobil->id }}'>
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
                        <img src="{{ asset($mobil->gambar) }}" class="img-fluid overflow-hidden rounded-sm"
                            alt="Responsive image" width="100%" id="imgPreview{{ $mobil->id }}">
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('admin.mobil.edit', $mobil->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama Mobil</label>
                                    <input type="nama" class="form-control img" id="namaMobil" name="namaMobil"
                                        placeholder="ex Avanza Toyota" value="{{ $mobil->nama_mobil }}">
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-dollar-sign"></i>
                                            </span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="Harga Sewa"
                                            id="harga_sewa" name="harga_sewa" value="{{ $mobil->harga_sewa }}">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fas fa-check"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi Kendaraan</label>
                                    <textarea class="form-control" rows="3" placeholder="Enter ..." id="deskripsi" name="deskripsi">
                                        {{ $mobil->deskripsi }}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Foto Kendaraan</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file"
                                                name="file">
                                            <label class="custom-file-label" for="exampleInputFile">Choose
                                                file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
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
<script>
    document.querySelectorAll('.custom-file-input').forEach(function(input) {
        input.addEventListener('change', function(e) {
            var fileName = e.target.files[0].name;
            var label = e.target.nextElementSibling;
            label.innerText = fileName;

            // Update image preview
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imgPreview{{ $mobil->id }}').src = e.target.result;
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>
