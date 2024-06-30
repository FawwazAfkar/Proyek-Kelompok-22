{{-- Modal Upload Bukti Transfer --}}
@props(['transaksi'])
<div class="modal fade" id="modal-upload-bukti{{ $transaksi->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Unggah Bukti Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <img src="{{ asset($transaksi->foto_bukti) }}" class="img-fluid overflow-hidden rounded-sm mb-3"
                         alt="preview" width="100%" id="imgPreview{{ $transaksi->id }}" style="display: none;">
                </div>
                <form action="{{ route('user.pesanan.uploadBukti', $transaksi->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="file" name="bukti_pembayaran" class="form-control" id="bukti_pembayaran" onchange="previewImage(this, 'imgPreview{{ $transaksi->id }}')">
                    <x-primary-button type="submit" class="btn btn-primary mt-3">
                        Unggah
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function previewImage(input, imgId) {
        var imgElement = document.getElementById(imgId);
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                imgElement.src = e.target.result;
                imgElement.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            imgElement.src = '';
            imgElement.style.display = 'none';
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        var imgElement = document.getElementById('imgPreview{{ $transaksi->id }}');
        if (imgElement.src && imgElement.src !== '{{ asset('') }}') {
            imgElement.style.display = 'block';
        }
    });
</script>
