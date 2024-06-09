{{-- Modal Edit Data Admin --}}
@props(['admin'])
<div class="modal fade" id="edit{{ $admin->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Admin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 d-flex justify-content-center align-items-center">
                        {{-- foto mobil --}}
                        <img src="{{ $admin->foto }}" class="img-fluid overflow-hidden img-circle"
                            alt="Responsive image" id="imgPreview" width="100%">
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('admin.user-admin.edit') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <input type="hidden" name="id" id="id-admin" value="{{ $admin->id }}" readonly />
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="ex Muhamad Galih" value="{{ $admin->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="ex xxxx@gmail.com" value="{{ $admin->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="file">Foto Kendaraan</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file"
                                                id="file">
                                            <label class="custom-file-label" for="file">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
