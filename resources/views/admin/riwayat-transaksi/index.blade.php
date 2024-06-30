@extends('layouts.admin.home')
@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Riwayat Transaksi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Riwayat Transaksi</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title flex-start">Riwayat Transaksi</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="data" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama User</th>
                            <th>Jenis Mobil</th>
                            <th>Foto Identitas</th>
                            <th>Jumlah hari</th>
                            <th>Total(Rp)</th>
                            <th>Total DP</th>
                            <th>Bukti Pembayaran DP</th>
                            <th>Status</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach($transaksis as $transaction)
                        @if($transaction->status == 'selesai')
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $transaction->nama_user }}</td>
                                <td>{{ $transaction->nama_mobil }}</td>
                                <td>
                                    <img src="{{ asset($transaction->kartu_identitas) }}" alt="Foto Identitas" class="img-thumbnail" width="100">
                                </td>
                                <td>{{ $transaction->jumlah_hari }} hari</td>
                                <td>{{ $transaction->harga_sewa }}</td>
                                <td>{{ $transaction->uang_muka}}</td>
                                <td>
                                    <img src="{{ asset($transaction->bukti_pembayaran) }}" alt="Bukti Pembayaran" class="img-thumbnail" width="100">
                                </td>
                                <td>
                                    <span class="badge badge-success">{{ $transaction->status }}</span>
                                </td>
                                <td class="d-flex justify-content-center">
                                    {{-- detail --}}
                                    <button type="button" class="btn btn-primary mr-4" data-toggle="modal" data-target="#modal-detail">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                        @endif
                        @endforeach
                        </tr>
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama User</th>
                            <th>Jenis Mobil</th>
                            <th>Foto Identitas</th>
                            <th>Jumlah hari</th>
                            <th>Total(Rp)</th>
                            <th>Total DP</th>
                            <th>Bukti Pembayaran DP</th>
                            <th>Status</th>
                            <th>Detail</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <x-admin.modal-transaksi-berlangsung />
</div>
@endsection
