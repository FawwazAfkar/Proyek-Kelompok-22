<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $recentCars = Car::latest()->take(3)->get();
        return view('user.dashboard', compact('recentCars'));
    }

    public function cars(){
        $cars = Car::all();
        $user = User::find(auth()->user()->id);
        return view('user.cars', compact('cars', 'user'));
    }
}
