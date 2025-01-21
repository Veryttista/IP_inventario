<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials=$request->validate([  'email' => 'required',  'password' => 'required', ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }
        return redirect()->intended('/')->with('error', 'Error en las credenciales');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
