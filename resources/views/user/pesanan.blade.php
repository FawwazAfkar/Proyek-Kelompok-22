<x-app-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-3 text-center border-0">
                    <div class="card-body">
                        <h5 class="card-title mb-3" style="font-weight: bold; font-size: 1.5rem;">Informasi Rekening</h5>
                        <p class="card-text mt-3 mb-2 text-muted" style="font-size: 0.9rem;">Silahkan transfer ke nomor rekening di bawah ini untuk melakukan pembayaran.</p>
                        <p class="card-text mb-2" style="font-size: 1rem;">Nama Pemilik: <strong>Jawir Sukiwir</strong></p>
                        <div class="d-flex justify-content-center align-items-center mb-2">
                            <p class="card-text mb-0" style="font-size: 1rem;">Nomor Rekening: <strong>1234567890</strong></p>
                            <button class="btn btn-outline-secondary btn-sm ms-2" onclick="copyToClipboard()">Salin</button>
                        </div>
                        <p class="card-text mb-0" style="font-size: 1rem;">Nama Bank: <strong>BRI</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container mb-8">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <span class="font-semibold">{{ __('Pesanan Anda') }}</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <ul class="nav nav-tabs" id="nav-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="true">Pending</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="dibayar-tab" data-bs-toggle="tab" data-bs-target="#dibayar" type="button" role="tab" aria-controls="dibayar" aria-selected="false">Dibayar</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="selesai-tab" data-bs-toggle="tab" data-bs-target="#selesai" type="button" role="tab" aria-controls="selesai" aria-selected="false">Selesai</button>
                                </li>
                            </ul>

                            <!-- Tab Panes -->
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                                    @if($pesanan->where('status', 'pending')->isEmpty())
                                    <p class="text-center text-muted my-4" style="font-size: 1.25rem; font-weight: bold;">Tidak ada pesanan pending.</p>
                                    @else
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nama Mobil</th>
                                                    <th>Tanggal Pemesanan</th>
                                                    <th>Deskripsi</th>
                                                    <th>Tanggal Mulai</th>
                                                    <th>Tanggal Selesai</th>
                                                    <th>Uang Muka</th>
                                                    <th>Total Biaya</th>
                                                    <th>Status</th>
                                                    <th>Bukti Bayar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($pesanan as $item)
                                                    @if($item->status == "pending")
                                                        <tr>
                                                            <td>{{ $item->nama_mobil }}</td>
                                                            <td>{{ $item->tanggal_pemesanan }}</td>
                                                            <td>{{ $item->deskripsi }}</td>
                                                            <td>{{ $item->tanggal_mulai }}</td>
                                                            <td>{{ $item->tanggal_selesai }}</td>
                                                            <td>{{ $item->uang_muka }}</td>
                                                            <td>{{ $item->total_biaya }}</td>
                                                            <td>
                                                                <span class="badge bg-warning text-dark">Pending</span>
                                                            </td>
                                                            <td>
                                                                @if($item->foto_bukti === NULL)
                                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-upload-bukti{{ $item->id }}">
                                                                        Unggah
                                                                    </button>
                                                                @else
                                                                    <span class="badge bg-warning text-dark">Menunggu Verifikasi</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <x-userapp.modal-upload-bukti :transaksi="$item" />
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="dibayar" role="tabpanel" aria-labelledby="dibayar-tab">
                                    @if($pesanan->where('status', 'dibayar')->isEmpty())
                                    <p class="text-center text-muted my-4" style="font-size: 1.25rem; font-weight: bold;">Tidak ada pesanan yang dibayar.</p>
                                    @else
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nama Mobil</th>
                                                    <th>Tanggal Pemesanan</th>
                                                    <th>Deskripsi</th>
                                                    <th>Tanggal Mulai</th>
                                                    <th>Tanggal Selesai</th>
                                                    <th>Uang Muka</th>
                                                    <th>Total Biaya</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($pesanan as $item)
                                                    @if($item->status == "dibayar")
                                                        <tr>
                                                            <td>{{ $item->nama_mobil }}</td>
                                                            <td>{{ $item->tanggal_pemesanan }}</td>
                                                            <td>{{ $item->deskripsi }}</td>
                                                            <td>{{ $item->tanggal_mulai }}</td>
                                                            <td>{{ $item->tanggal_selesai }}</td>
                                                            <td>{{ $item->uang_muka }}</td>
                                                            <td>{{ $item->total_biaya }}</td>
                                                            <td>
                                                                <span class="badge bg-primary text-light">Dibayar</span>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="selesai" role="tabpanel" aria-labelledby="selesai-tab">
                                    @if($pesanan->where('status', 'selesai')->isEmpty())
                                    <p class="text-center text-muted my-4" style="font-size: 1.25rem; font-weight: bold;">Tidak ada pesanan yang selesai.</p>
                                    @else
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nama Mobil</th>
                                                    <th>Tanggal Pemesanan</th>
                                                    <th>Deskripsi</th>
                                                    <th>Tanggal Mulai</th>
                                                    <th>Tanggal Selesai</th>
                                                    <th>Uang Muka</th>
                                                    <th>Total Biaya</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($pesanan as $item)
                                                    @if($item->status == "selesai")
                                                        <tr>
                                                            <td>{{ $item->nama_mobil }}</td>
                                                            <td>{{ $item->tanggal_pemesanan }}</td>
                                                            <td>{{ $item->deskripsi }}</td>
                                                            <td>{{ $item->tanggal_mulai }}</td>
                                                            <td>{{ $item->tanggal_selesai }}</td>
                                                            <td>{{ $item->uang_muka }}</td>
                                                            <td>{{ $item->total_biaya }}</td>
                                                            <td>
                                                                <span class="badge bg-success text-light">Selesai</span>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function copyToClipboard() {
        const text = `1234567890`;
        navigator.clipboard.writeText(text).then(function() {
            var copyToast = new bootstrap.Toast(document.getElementById('copyToast'));
            copyToast.show();
        }, function(err) {
            console.error('Gagal menyalin teks: ', err);
        });
    }
</script>
