<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index(){
        $mobils = Car::all();
        return view('admin.mobil.index', compact('mobils'));
    }
    public function tambahMobil(Request $request){

    $request->validate([
        'namaMobil' => 'required|string|max:255',
        'harga_sewa' => 'required|numeric',
        'deskripsi' => 'required|string',
        'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);



    if($request->hasFile('file')){
        $path = $request->file('file');
        $filename = time().'_'.$path->getClientOriginalName();
        $path->storeAs('public/images/mobil', $filename);
        $pathStore = '/storage/images/mobil/'.$filename;
    }else{
        $pathStore = '/storage/images/default.png';
    }



    $mobil = Car::create([
        'nama_mobil' => $request->namaMobil,
        'harga_sewa' => $request->harga_sewa,
        'gambar' => $pathStore,
        'status' => true,
        'deskripsi' => $request->deskripsi,
    ]);


    return redirect()->route('admin.mobil.index')->with('success', 'Mobil berhasil ditambahkan');
}

    public function editMobil(Request $request, $id){
        $request->validate([
            'namaMobil' => 'required|string|max:255',
            'harga_sewa' => 'required|numeric',
            'deskripsi' => 'required|string',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $mobil = Car::find($id);

        if($request->hasFile('file')){
            // Hapus gambar lama jika ada dan bukan gambar default
                if ($mobil->gambar && $mobil->gambar != '/storage/images/default.png') {
                    $oldFilePath = str_replace('/storage', 'public', $mobil->gambar);
                    Storage::delete($oldFilePath);
                }

                // Simpan gambar baru
                $path = $request->file('file');
                $filename = time().'_'.$path->getClientOriginalName();
                $path->storeAs('public/images/mobil', $filename);
                $pathStore = '/storage/images/mobil/'.$filename;
        }else{
            $pathStore = $mobil->gambar;
        }

        $mobil->update([
            'nama_mobil' => $request->namaMobil,
            'harga_sewa' => $request->harga_sewa,
            'gambar' => $pathStore,
            'status' => true,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.mobil.index')->with('success', 'Mobil berhasil diubah');
    }

    public function hapusMobil($id){
        $mobil = Car::find($id);
        if ($mobil->gambar && $mobil->gambar != '/storage/images/default.png') {
            $oldFilePath = str_replace('/storage', 'public', $mobil->gambar);
            Storage::delete($oldFilePath);
        }
        $mobil->delete();
        return redirect()->route('admin.mobil.index')->with('success', 'Mobil berhasil dihapus');
    }

}
