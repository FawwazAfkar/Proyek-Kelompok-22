{{-- Modal Detail Mobil --}}
@props(['mobil'])
<div class="modal fade" id="modal-detail-mobil{{ $mobil->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title font-semibold">Detail Mobil</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset($mobil->gambar) }}" class="img-fluid rounded" alt="{{ $mobil->nama_mobil }}">
                    </div>
                    <div class="col-md-6">
                        <x-userapp.desc
                            :nama="$mobil->nama_mobil"
                            :deskripsi="$mobil->deskripsi"
                            :harga="$mobil->harga_sewa">
                        </x-userapp.desc>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                @if ($mobil->ketersediaan)
                    <span class="badge bg-success">Tersedia</span>
                    <x-primary-button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modal-transaksi{{ $mobil->id }}">Sewa Sekarang</x-primary-button>
                @else
                    <span class="badge bg-danger">Tidak Tersedia</span>
                    <x-danger-button type="button" class="btn btn-danger" disabled>Sewa Sekarang</x-danger-button>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->
