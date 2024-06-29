{{-- Modal Detail Mobil --}}
@props(['mobil'])
<div class="modal fade" id="modal-detail-mobil{{ $mobil->id }}"> 
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Mobil</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset($mobil->gambar) }}" class="img-fluid" alt="{{ $mobil->nama_mobil }}">
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-uppercase">{{ $mobil->nama_mobil }}</h5>
                        <p>{{ $mobil->deskripsi }}</p>
                        <p>Harga Sewa: {{ $mobil->harga_sewa }}</p>
                        <p>Tahun: {{ $mobil->tahun }}</p>
                        <p>Warna: {{ $mobil->warna }}</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <x-primary-button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modal-transaksi{{ $mobil->id }}">Sewa Sekarang</x-primary-button>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->