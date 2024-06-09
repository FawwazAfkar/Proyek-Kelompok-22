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
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title flex-start">DataTable with default features</h3>
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</>
                                <td>Avanza</td>
                                <td>200000</td>
                                <td>Mobil Keluarga</td>
                                <td><img src="{{ asset('lte/dist/img/user2-160x160.jpg') }}" alt="Foto Mobil"
                                        class="img-circle img-size-32 mr-2"></td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modal-edit">
                                        <i class="fa-solid fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#modal-hapus">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Mobil</th>
                                <th>Harga Sewa</th>
                                <th>Deskripsi</th>
                                <th>Foto</th>
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
