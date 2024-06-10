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
                        {{-- foto admin --}}
                        <img src="{{ $admin->foto }}" class="img-fluid overflow-hidden img-circle"
                            alt="Responsive image" id="imgPreview{{ $admin->id }}" width="100%">
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('admin.user-admin.edit', $admin->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name{{ $admin->id }}">Nama</label>
                                    <input type="text" class="form-control" name="name"
                                        id="name{{ $admin->id }}" placeholder="ex Muhamad Galih"
                                        value="{{ $admin->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="email{{ $admin->id }}">Email</label>
                                    <input type="email" class="form-control" name="email"
                                        id="email{{ $admin->id }}" placeholder="ex xxxx@gmail.com"
                                        value="{{ $admin->email }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="password{{ $admin->id }}">Password</label>
                                    <input type="password" class="form-control" name="password"
                                        id="password{{ $admin->id }}" placeholder="Password">
                                    <small class="text-mute">Kosongkan jika tidak ingin mengganti password</small>
                                </div>
                                <div class="form-group">
                                    <label for="file{{ $admin->id }}">Foto Profile</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file"
                                                id="file{{ $admin->id }}">
                                            <label class="custom-file-label" for="file{{ $admin->id }}">Choose
                                                file</label>
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

<script>
    document.querySelectorAll('.custom-file-input').forEach(function(input) {
        input.addEventListener('change', function(e) {
            var fileName = e.target.files[0].name;
            var label = e.target.nextElementSibling;
            label.innerText = fileName;

            // Update image preview
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imgPreview{{ $admin->id }}').src = e.target.result;
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>
