<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index1(){
        return view("admin.transaksi-berlangsung.index");
    }
    public function index2(){
        return view("admin.riwayat-transaksi.index");
    }
}
