<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        // ketika login dengan role user, maka akan diarahkan ke halaman dashboard
        return view('dashboard');
    }
}
