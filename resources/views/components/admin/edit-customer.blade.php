{{-- Modal Edit Data Admin --}}
@props(['user'])
<div class="modal fade" id="edit{{ $user->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Customer</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 d-flex justify-content-center align-items-center">
                        <img src="{{ asset($user->foto ? 'storage/' . $user->foto : 'path/to/default-image.jpg') }}"
                            class="img-fluid overflow-hidden rounded-circle"
                            alt="Profile Picture" id="imgPreview{{ $user->id }}" style="max-width: 100%; height: auto;">
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('admin.user-customer.edit', $user->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name{{ $user->id }}">Nama</label>
                                    <input type="text" class="form-control" name="name"
                                        id="name{{ $user->id }}" placeholder="ex Muhamad Galih"
                                        value="{{ $user->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="email{{ $user->id }}">Email</label>
                                    <input type="email" class="form-control" name="email"
                                        id="email{{ $user->id }}" placeholder="ex xxxx@gmail.com"
                                        value="{{ $user->email }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="password{{ $user->id }}">Password</label>
                                    <input type="password" class="form-control" name="password"
                                        id="password{{ $user->id }}" placeholder="Password">
                                    <small class="text-muted">Kosongkan jika tidak ingin mengganti password</small>
                                </div>
                                <div class="form-group">
                                    <label for="file{{ $user->id }}">Foto Profile</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="foto"
                                                id="file{{ $user->id }}">
                                            <label class="custom-file-label" for="file{{ $user->id }}">Choose
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
                document.getElementById('imgPreview{{ $user->id }}').src = e.target.result;
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>
