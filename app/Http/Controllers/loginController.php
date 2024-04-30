<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class loginController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function admin_login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'Email Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
        ]);

        $infologin = $request->only('email', 'password');

        if (Auth::attempt($infologin)) {
            if (Auth::user()->hasRole('admin')) {
                return redirect()->route('admin');
            } else {
                return redirect()->route('user.index');
            }
        }
        return redirect()->route('login')->with('failed', 'Email atau Password Salah');
    }



    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success', 'Berhasil Logout');
    }

    public function daftar()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
        ]);

        $user->assignRole('user');

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat! Silakan login.');
    }
}
