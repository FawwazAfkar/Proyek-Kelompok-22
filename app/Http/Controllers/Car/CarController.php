<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(){
        return view('admin.mobil.index');
    }
    public function tambahMobil(Request $request){
        
    }
}
