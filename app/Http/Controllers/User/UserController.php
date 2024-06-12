<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $recentCars = Car::latest()->take(3)->get();
        return view('user.dashboard', compact('recentCars'));
    }

    public function cars(){
        $cars = Car::all();
        return view('user.cars', compact('cars'));
    }
}
