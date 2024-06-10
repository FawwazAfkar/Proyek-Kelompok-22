<?php

namespace App\Http\Controllers\Users;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rules;
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
       $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($request->hasFile('file')){
            $path = $request->file('file');
            $filename = time().'_'.$path->getClientOriginalName();
            $path->storeAs('public/images/admin', $filename);
            $pathStore = '/storage/images/admin/'.$filename;
        }else{
            $pathStore = '/storage/images/default.png';
        }
        $admin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'foto' => $pathStore,
            'usertype' => 'admin',
        ]);

        return redirect()->route('admin.user-admin.index')->with('success', 'Admin berhasil ditambahkan');
    }

    public function editAdmin(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'password' => 'nullable|string|min:8',
        'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Temukan admin yang ingin diedit
    $admin = User::findOrFail($id);

    // Hapus foto admin sebelumnya jika ada
    if ($admin->foto !== '/storage/images/default.png' && Storage::exists(str_replace('/storage', 'public', $admin->foto))) {
        Storage::delete(str_replace('/storage', 'public', $admin->foto));
    }

    // Perbarui data admin
    $admin->name = $request->name;
    $admin->email = $request->email;

    // Perbarui password jika diisi dalam form
    if ($request->filled('password')) {
        $admin->password = Hash::make($request->password);
    }

    // Perbarui foto jika file diunggah
    if ($request->hasFile('file')) {
        $path = $request->file('file');
        $filename = time() . '_' . $path->getClientOriginalName();
        $path->storeAs('public/images/admin', $filename);
        $pathStore = '/storage/images/admin/' . $filename;
        $admin->foto = $pathStore;
    }

    // Simpan perubahan
    $admin->save();

    return redirect()->route('admin.user-admin.index')->with('success', 'Admin berhasil diperbarui');
}

    public function hapusAdmin($id)
    {
        $admin = User::find($id);

       // gambar admin sebelumnya jika ada
       if ($admin->foto !== '/storage/images/default.png' && Storage::exists(str_replace('/storage', 'public', $admin->foto))) {
            Storage::delete(str_replace('/storage', 'public', $admin->foto));
        }
        $admin->delete();
        return redirect()->route('admin.user-admin.index')->with('success','Admin berhasil dihapus.');
    }
    public function tambahCustomer(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($request->hasFile('file')){
            $path = $request->file('file');
            $filename = time().'_'.$path->getClientOriginalName();
            $path->storeAs('public/images/user', $filename);
            $pathStore = '/storage/images/user/'.$filename;
        }else{
            $pathStore = '/storage/images/default.png';
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'foto' => $pathStore,
            'usertype' => 'user',
        ]);

        return redirect()->route('admin.user-customer.index')->with('success', 'Customer berhasil ditambahkan');
    }

    public function editCustomer(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Temukan customer yang ingin diedit
        $user = User::findOrFail($id);

        // Hapus foto customer sebelumnya jika ada
        if ($user->foto !== '/storage/images/default.png' && Storage::exists(str_replace('/storage', 'public', $user->foto))) {
            Storage::delete(str_replace('/storage', 'public', $user->foto));
        }

        // Perbarui data customer
        $user->name = $request->name;
        $user->email = $request->email;

        // Perbarui password jika diisi dalam form
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Perbarui foto jika file diunggah
        if ($request->hasFile('file')) {
            $path = $request->file('file');
            $filename = time() . '_' . $path->getClientOriginalName();
            $path->storeAs('public/images/user', $filename);
            $pathStore = '/storage/images/user/' . $filename;
            $user->foto = $pathStore;
        }

        // Simpan perubahan
        $user->save();

        return redirect()->route('admin.user-customer.index')->with('success', 'Customer berhasil diperbarui');
    }

    public function hapusCustomer($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('admin.user-customer.index')->with('error','Customer tidak ditemukan.');
        }

        $user->delete();
        return redirect()->route('admin.user-customer.index')->with('success','Customer berhasil dihapus.');
    }
}
