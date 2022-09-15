<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LogoutResponse;

class UserLogoutController extends Controller
{
    public function logout()
    {
        Auth::logout();
        
        return redirect()->to('/welcome');
    }
}
