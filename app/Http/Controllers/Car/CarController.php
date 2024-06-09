<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(){
        return view('admin.mobil.index');
    }

    public function adminCarStore(Request $request)
    {
        // Validate the request data
        $request->validate([
            'nama_mobil' => 'required|string',
            'harga_sewa' => 'required|integer',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required|string',
        ]);

            // Handle file upload
        if ($request->hasFile('gambar')) {
            // Get the file name with extension
            $fileNameWithExt = $request->file('gambar')->getClientOriginalName();
            // Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('gambar')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            // Upload image
            $path = $request->file('gambar')->storeAs('public/images/', $fileNameToStore);
        } else {
            // If no image uploaded, set default image or return error message
            $fileNameToStore = 'noimage.jpg'; // You can change this to your default image name
            // return redirect()->back()->with('error', 'No image uploaded.');
        }

        $car = new Car();
        $car->nama_mobil = $request->input('nama_mobil');
        $car->harga_sewa = $request->input('harga_sewa');
        $car->gambar = $fileNameToStore;
        $car->deskripsi = $request->input('deskripsi');

        // Simpan car baru ke database
        $car->save();
        return redirect()->route('admin.mobil.index')->with('success','Mobil berhasil ditambahkan.');
    }

}
