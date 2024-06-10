<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $admins = User::where('usertype', 'admin')->get();
        $users = User::where('usertype', 'user')->get();
        $jumlahAdmin = count($admins);
        $jumlahUser = count($users);
        return view('admin.dashboard',compact('jumlahAdmin', 'jumlahUser'));
    }
}
