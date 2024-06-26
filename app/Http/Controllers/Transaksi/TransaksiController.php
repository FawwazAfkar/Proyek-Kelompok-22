<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index1(){
        return view("admin.transaksi-berlangsung.index");
    }
    public function index2(){
        return view("admin.riwayat-transaksi.index");
    }
    public function pesanan(){
       // join table cars, transaksi
        $pesanan = DB::table('transaksis')
            ->join('cars', 'transaksis.car_id', '=', 'cars.id')
            ->select('transaksis.*', 'cars.*')
            ->get();

            return view('user.pesanan', compact('pesanan'));    
    }

    public function store(Request $request){
        $request->validate([
            'file' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if($request->hasFile('file')){
            $path = $request->file('file');
            $filename = time().'_'.$path->getClientOriginalName();
            $path->storeAs('public/images/user/kartuid', $filename);
            $pathStore = '/storage/images/user/kartuid/'.$filename;
        }else{
            $pathStore = NULL;
        }

        //insertorupdate idcard
        $user_id = $request->input('user_id');

        $user = User::findOrFail($user_id);

        // Hapus foto customer sebelumnya jika ada
        if ($user->kartu_identitas !== NULL && Storage::exists(str_replace('/storage', 'public', $user->kartu_identitas))) {
            Storage::delete(str_replace('/storage', 'public', $user->kartu_identitas));
        }

        if ($request->hasFile('file')) {
            $path = $request->file('file');
            $filename = time() . '_' . $path->getClientOriginalName();
            $path->storeAs('public/images/user/kartuid', $filename);
            $pathStore = '/storage/images/user/kartuid/' . $filename;
            $user->kartu_identitas = $pathStore;
        }

        $user->save();

        //insert transaksi

        $mobil_id = $request->input('mobil_id');
        $dp = preg_replace('/[^0-9]/', '', $request->input('dp'))/100;
        $total_biaya = preg_replace('/[^0-9]/', '', $request->input('total_biaya'))/100;

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

        return redirect()->route('user.pesanan')->with('success', 'Transaksi berhasil');

    }
}
