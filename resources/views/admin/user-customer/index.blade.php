@extends('layouts.admin.home')

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Daftar Customer</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Daftar Customer</li>
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
                    <h3 class="card-title flex-start">Data Customer yang Terdaftar</h3>
                    <div class="ml-auto">
                        <!-- Tambahkan kelas ml-auto di sini -->
                        {{-- Muncul Modals --}}
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#modal-tambah-Customer">
                            <i class="fa-solid fa-plus"></i> Tambah Customer
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="data" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Customer</th>
                                <th>Usertype</th>
                                <th>Email</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->usertype }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <img src="{{ $user->foto ? asset('storage/' . $user->foto) : asset('storage/images/defaultuser.jpg') }}" alt="Foto Customer"
                                            class="img-circle img-size-32 mr-2">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#edit{{ $user->id }}">
                                            <i class="fa-solid fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#delete{{ $user->id }}">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        <x-admin.delete-customer :user="$user->id" />
                                        <x-admin.edit-customer :user="$user" />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Customer</th>
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

        <x-admin.modal-admin-customer />
    </div>
@endsection
