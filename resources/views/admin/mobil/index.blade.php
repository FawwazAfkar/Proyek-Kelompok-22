@extends('layouts.admin.home')
@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Mobil</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Daftar Mobil</li>
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
                    <h3 class="card-title flex-start">Data Seluruh Inventaris Mobil</h3>
                    <div class="ml-auto"> <!-- Tambahkan kelas ml-auto di sini -->
                        {{-- Muncul Modals --}}
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">
                            <i class="fa-solid fa-plus"></i> Tambah
                            Data
                        </button>

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="data" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Mobil</th>
                                <th>Harga Sewa</th>
                                <th>Deskripsi</th>
                                <th>Foto</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mobils as $mobil)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $mobil->nama_mobil }}</td>
                                    <td>{{ 'Rp ' . number_format($mobil->harga_sewa, 0, ',', '.') . ' /hari' }}</td>
                                    <td>{{ $mobil->deskripsi }}</td>

                                    <td><img src="{{ asset($mobil->gambar) }}" alt="Foto Mobil"
                                            class="img-circle img-size-32 mr-2"></td>
                                    <td>
                                        @if ($mobil->ketersediaan)
                                            <span class="badge badge-success">Tersedia</span>
                                        @else
                                            <span class="badge badge-danger">Tidak Tersedia</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#edit{{ $mobil->id }}">
                                            <i class="fa-solid fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#delete{{ $mobil->id }}">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        <x-admin.edit-mobil :mobil="$mobil" />
                                        <x-admin.delete-mobil :mobil="$mobil->id" />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Mobil</th>
                                <th>Harga Sewa</th>
                                <th>Deskripsi</th>
                                <th>Foto</th>
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

        <x-admin.modal-admin-mobil />
    </div>
@endsection
