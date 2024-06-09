<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function indexAdmin(){
        $admins = User::where('usertype', 'admin')->get();
        return view('admin.user-admin.index',compact('admins'));
    }

    public function indexUser(){
        $users = User::where('usertype', 'user')->get();
        return view('admin.user-customer.index',compact('users'));
    }

    public function tambahAdmin(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            // Anda bisa menambahkan validasi untuk foto profile sesuai kebutuhan
        ]);

        // Buat instance user baru
        $user = new User();
        $user->name = $request->input('nama');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        // Tambahkan atribut lainnya sesuai kebutuhan, misalnya usertype
        $user->usertype = 'admin';

        // Simpan user baru ke database
        $user->save();
        return redirect()->route('admin.user-admin.index')->with('success','Admin berhasil ditambahkan.');
    }

    public function editAdmin($id)

    public function hapusAdmin($id)
    {
        $admin = User::find($id);

        if (!$admin) {
            return redirect()->route('admin.user-admin.index')->with('error','Admin tidak ditemukan.');
        }

        $admin->delete();
        return redirect()->route('admin.user-admin.index')->with('success','Admin berhasil dihapus.');
    }
}
