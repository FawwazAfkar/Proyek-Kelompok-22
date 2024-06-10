<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Car extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        "nama_mobil","harga_sewa","gambar","status","deskripsi"
    ];


}
