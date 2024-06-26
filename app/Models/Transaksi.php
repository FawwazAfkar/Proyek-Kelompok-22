<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Transaksi extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id', 'car_id', 'tanggal_pemesanan','tanggal_mulai', 'tanggal_selesai', 'uang_muka', 'total_biaya', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}

