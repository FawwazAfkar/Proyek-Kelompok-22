<?php

namespace App\Http\Controllers\Users;

use Illuminate\Support\Facades\Storage;
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
    public function editAdmin(Request $request)
            {
                $validatedData = $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|unique:users,email,' . $request->id,
                    'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);

                // Temukan user berdasarkan ID
                $admin = User::findOrFail($request->id);

                // Update data user
                $admin->name = $request->name;
                $admin->email = $request->email;

                // Jika ada file foto yang di-upload
                if ($request->hasFile('file')) {
                    // Hapus file lama jika ada
                    if ($admin->foto) {
                        Storage::delete($admin->foto);
                    }

                    // Simpan file foto baru
                    $path = $request->file('file')->store('public/foto/admin');
                    $admin->foto = $path;
                }

                // Simpan perubahan
                $admin->save();

                // Redirect atau berikan respons sesuai kebutuhan
                return redirect()->route('admin.user-admin.index')->with('success', 'Data admin berhasil di-update');
            }

    public function hapusAdmin($id)
    {
        $admin = User::find($id);

        if (!$admin) {
            return redirect()->route('admin.user-admin.index')->with('error','Admin tidak ditemukan.');
        }

        $admin->delete();
        return redirect()->route('admin.user-admin.index')->with('success','Admin berhasil dihapus.');
    }
    public function tambahCustomer(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $customer = new User;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
        $customer->usertype = 'user'; // Jika ada tipe user

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('public/foto/customer');
            $customer->foto = $path;
        }

        $customer->save();

        return redirect()->route('admin.user-customer.index')->with('success', 'Customer berhasil ditambahkan');
    }
}
