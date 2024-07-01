@extends('layouts.admin.home')
@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Transaksi Berlangsung</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Transaksi Berlangsung</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title flex-start">Transaksi Berlangsung</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="data" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Customer</th>
                                <th>Jenis Mobil</th>
                                <th>Foto Identitas</th>
                                <th>Durasi (hari)</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Total Biaya Sewa</th>
                                <th>DP Minimal</th>
                                <th>Bukti Pembayaran</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($transaksis as $transaction)
                                @if ($transaction->status == 'pending' || $transaction->status == 'dibayar')
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $transaction->nama_user }}</td>
                                        <td>{{ $transaction->nama_mobil }}</td>
                                        <td>
                                            <img src="{{ asset($transaction->kartu_identitas) }}" alt="Foto Identitas"
                                                class="img-thumbnail" width="100">
                                        </td>
                                        <td>{{ $transaction->jumlah_hari }}</td>
                                        @if ($transaction->status == 'pending')
                                            <td>
                                                <span class="badge badge-warning">belum di set</span>
                                            </td>
                                            <td>
                                                <span class="badge badge-warning">belum di set</span>
                                            </td>
                                        @elseif ($transaction->status == 'dibayar')
                                            <td>{{ $transaction->tanggal_mulai }}</td>
                                            <td>{{ $transaction->tanggal_selesai }}</td>
                                        @endif
                                        <td>{{ $transaction->total_biaya }}</td>
                                        <td>{{ $transaction->uang_muka }}</td>
                                        <td>
                                            <img src="{{ asset($transaction->foto_bukti) }}" alt="Bukti Pembayaran"
                                                class="img-thumbnail" width="100">
                                        </td>
                                        <td>
                                            @if ($transaction->status == 'pending')
                                                <span class="badge badge-warning">{{ $transaction->status }}</span>
                                            @elseif($transaction->status == 'dibayar')
                                                <span class="badge badge-success">{{ $transaction->status }}</span>
                                            @endif
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            {{-- detail --}}
                                            <button type="button" class="btn btn-primary mr-4" data-toggle="modal"
                                                data-target="#modal-detail{{ $transaction->id }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            {{-- acc --}}
                                            @if ($transaction->status == 'pending')
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#modal-acc{{ $transaction->id }}">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#modal-batal{{ $transaction->id }}">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            @elseif($transaction->status == 'dibayar')
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#modal-selesai{{ $transaction->id }}">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                    <x-admin.modal-detail-transaksi :transaction="$transaction" />
                                    <x-admin.modal-acc-transaksi :transaction="$transaction" />
                                    <x-admin.modal-batalkan-transaksi :transaction="$transaction" />
                                    <x-admin.modal-selesai-transaksi :transaction="$transaction" />
                                @endif
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Customer</th>
                                <th>Jenis Mobil</th>
                                <th>Foto Identitas</th>
                                <th>Durasi (hari)</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Total Biaya Sewa</th>
                                <th>DP Minimal</th>
                                <th>Bukti Pembayaran</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
