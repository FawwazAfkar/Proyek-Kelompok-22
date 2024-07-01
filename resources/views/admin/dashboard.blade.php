@extends('layouts.admin.home')
@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection
@section('content')
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1">
                    <i class="fa-solid fa-user-tie"></i>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text">Admin</span>
                    <span class="info-box-number">
                        {{ $jumlahAdmin }}
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1">
                    <i class="fa-solid fa-users"></i>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text">Customer</span>
                    <span class="info-box-number">{{ $jumlahUser }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-car"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Jumlah Mobil</span>
                    <span class="info-box-number">{{ $jumlahMobil }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fa-solid fa-money-bill"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Transaksi Aktif</span>
                    <span class="info-box-number">{{ $jumlahTransaksi }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>

        </div>
        <!-- /.info-box -->

        <!-- /.col -->
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <img src="https://wallpapercave.com/wp/wp2899051.jpg" alt="" style="width: 100%; height: 100%;">
                </div>
            </div>
        </div>
    </div>
@endsection
