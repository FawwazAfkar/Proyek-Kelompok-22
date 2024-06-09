@extends('layouts.admin.home')

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Daftar Admin</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Daftar Admin</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title flex-start">Data Admin yang Bekerja</h3>
                    <div class="ml-auto"> <!-- Tambahkan kelas ml-auto di sini -->
                        {{-- Muncul Modals --}}
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#modal-tambah-admin">
                            <i class="fa-solid fa-plus"></i> Tambah Admin
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="data" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Admin</th>
                                <th>Usertype</th>
                                <th>Email</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $admin)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->usertype }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td><img src="{{ asset('lte/dist/img/user2-160x160.jpg') }}" alt="Foto Admin"
                                            class="img-circle img-size-32 mr-2"></td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#edit{{ $admin->id }}">
                                            <i class="fa-solid fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-delete-admin"
                                            data-id="{{ $admin->id }}" data-toggle="modal"
                                            data-target="#delete{{ $admin->id }}">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        <x-admin.delete-admin :admin="$admin->id" />
                                        <x-admin.edit-admin :admin="$admin" />


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Admin</th>
                                <th>Usertype</th>
                                <th>Email</th>
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

        <x-admin.modal-admin-admin />
    </div>
@endsection
