<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Car;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index1(){
        $transaksis = Transaksi::select('transaksis.*', 'cars.nama_mobil','cars.harga_sewa', 'users.name as nama_user','users.kartu_identitas','cars.gambar as gambar_mobil')
            ->join('cars', 'transaksis.car_id', '=', 'cars.id')
            ->join('users', 'transaksis.user_id', '=', 'users.id')
            ->get();
        return view("admin.transaksi-berlangsung.index", compact('transaksis'));
    }
    public function index2(){
        $transaksis = Transaksi::select('transaksis.*', 'cars.nama_mobil', 'cars.harga_sewa', 'users.name as nama_user','users.kartu_identitas','cars.gambar as gambar_mobil')
            ->join('cars', 'transaksis.car_id', '=', 'cars.id')
            ->join('users', 'transaksis.user_id', '=', 'users.id')
            ->get();
        return view("admin.riwayat-transaksi.index", compact('transaksis') );
    }
    public function pesanan(){
       // join table cars, transaksi
        $pesanan = DB::table('transaksis')
            ->join('cars', 'transaksis.car_id', '=', 'cars.id')
            ->select('transaksis.*', 'cars.*')
            ->get();

            return view('user.pesanan', compact('pesanan'));    
    }

    public function store(Request $request)
{
    $request->validate([
        'file' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $pathStore = NULL;

    if ($request->hasFile('kartu_identitas')) {
        $path = $request->file('kartu_identitas');
        $filename = time() . '_' . $path->getClientOriginalName();
        $path->storeAs('public/images/user/kartuid', $filename);
        $pathStore = '/storage/images/user/kartuid/' . $filename;
    }

    // Insert or update idcard
    $user_id = $request->input('user_id');
    $user = User::findOrFail($user_id);

    // Delete previous id card image if it exists
    if ($user->kartu_identitas !== NULL && Storage::exists(str_replace('/storage', 'public', $user->kartu_identitas))) {
        Storage::delete(str_replace('/storage', 'public', $user->kartu_identitas));
    }

    // Update user id card image
    if ($pathStore !== NULL) {
        $user->kartu_identitas = $pathStore;
    }

    $user->save();

    // Insert transaksi
    $mobil_id = $request->input('mobil_id');
    $dp = preg_replace('/[^0-9]/', '', $request->input('dp')) / 100;
    $total_biaya = preg_replace('/[^0-9]/', '', $request->input('total_biaya')) / 100;

    $transaksi = Transaksi::create([
        'user_id' => $user_id,
        'car_id' => $mobil_id,
        'tanggal_pemesanan' => now()->toDate(),
        'tanggal_mulai' => NULL,
        'tanggal_selesai' => NULL,
        'uang_muka' => $dp,
        'total_biaya' => $total_biaya,
        'status' => 'pending',
        'bukti_pembayaran' => NULL,
    ]);

    // Update ketersediaan mobil
    $mobil = Car::findOrFail($mobil_id);
    $mobil->ketersediaan = false;
    $mobil->save();

    return redirect()->route('user.pesanan')->with('success', 'Transaksi berhasil');
}


    public function uploadBukti(Request $request, $id)
    {
        $request->validate([
            'file' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $transaksi = Transaksi::findOrFail($id);

        if ($transaksi->foto_bukti !== NULL && Storage::exists(str_replace('/storage', 'public', $transaksi->foto_bukti))) {
            Storage::delete(str_replace('/storage', 'public', $transaksi->foto_bukti));
        }

        if($request->hasFile('bukti_pembayaran')){
            $path = $request->file('bukti_pembayaran');
            $filename = time().'_'.$path->getClientOriginalName();
            $path->storeAs('public/images/transaksi', $filename);
            $pathStore = '/storage/images/transaksi/'.$filename;
        }else{
            $pathStore = NULL;
        }

        $transaksi->foto_bukti = $pathStore;
        $transaksi->save();

        return redirect()->route('user.pesanan')->with('success', 'Upload Bukti Transfer berhasil');
    }

    public function updateStatusBayar($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->status = 'dibayar';
        $transaksi->save();
        return redirect()->route('admin.transaksi-berlangsung.index')->with('success', 'Status transaksi berhasil diperbarui');
    }

    public function hapusTransaksi($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        return redirect()->route('admin.transaksi-berlangsung.index')->
        with('success', 'Transaksi berhasil dihapus');
    }


    public function updateStatusSelesai($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->status = 'selesai';
        $transaksi->save();
        return redirect()->route('admin.riwayat-transaksi.index')->with('success', 'Status transaksi berhasil diperbarui menjadi selesai');
    }
    
}
