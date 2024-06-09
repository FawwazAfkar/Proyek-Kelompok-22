<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        // ketika login dengan role user, maka akan diarahkan ke halaman dashboard
        $cars = Car::latest()->get();
        return view('user.dashboard', compact('cars'));
    }
}
