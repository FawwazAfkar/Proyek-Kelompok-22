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
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="transaksi_id" value="{{ $transaksi->id }}">
                    <input type="file" name="bukti_pembayaran" class="form-control" id="bukti_pembayaran">
                    <button type="submit" class="btn btn-primary mt-3">
                        Unggah
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>