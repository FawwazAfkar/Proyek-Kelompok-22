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
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title flex-start">DataTable with default features</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="data" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pembeli</th>
                                <th>Jenis Mobil</th>
                                <th>Foto Identitas</th>
                                <th>Jumlah hari</th>
                                <th>Total(Rp)</th>
                                <th>Bukti Pembayaran</th>

                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>Toyota Avanza</td>
                                <td>
                                    <img src="{{ asset('img/identitas.jpg') }}" alt="Foto Identitas" class="img-thumbnail"
                                        width="100">
                                </td>
                                <td>3 hari</td>
                                <td>1.500.000</td>
                                <td>
                                    <img src="{{ asset('img/bukti-pembayaran.jpg') }}" alt="Bukti Pembayaran"
                                        class="img-thumbnail" width="100">
                                </td>
                                <td class="d-flex justify-content-center">
                                    {{-- detail --}}
                                    <button type="button" class="btn btn-primary mr-4" data-toggle="modal"
                                        data-target="#modal-detail">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    {{-- acc --}}
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#modal-acc">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#modal-batal">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Pembeli</th>
                                <th>Jenis Mobil</th>
                                <th>Foto Identitas</th>
                                <th>Jumlah hari</th>
                                <th>Total(Rp)</th>
                                <th>Bukti Pembayaran</th>
                                <th>Aksi</th>
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
