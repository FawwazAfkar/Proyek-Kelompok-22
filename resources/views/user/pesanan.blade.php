<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Pesanan Anda') }}</div>
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
                                                <th>Aksi</th>
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
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-upload-bukti{{ $item->id }}">
                                                        Unggah
                                                    </button>
                                                </td>
                                            </tr>
                                            <x-userapp.modal-upload-bukti :transaksi="$item" />
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="dibayar" role="tabpanel" aria-labelledby="dibayar-tab">
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
                                </div>
                                <div class="tab-pane fade" id="selesai" role="tabpanel" aria-labelledby="selesai-tab">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
