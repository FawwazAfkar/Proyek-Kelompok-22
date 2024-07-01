<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Car;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $admins = User::where('usertype', 'admin')->get();
        $users = User::where('usertype', 'user')->get();
        $mobil = Car::all();
        $transaksi = Transaksi::whereIn('status', ['pending', 'dibayar'])->get();
        $jumlahAdmin = count($admins);
        $jumlahUser = count($users);
        $jumlahMobil = count($mobil);
        $jumlahTransaksi = count($transaksi);

        return view('admin.dashboard',compact('jumlahAdmin', 'jumlahUser','jumlahMobil','jumlahTransaksi'));
    }
}
