<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\rental;
use App\Http\Controllers\rentalcontroller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginregistercontroller extends Controller
{
    public function login()
    {
        return view('daftar.login');
    }
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:8|max:20'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            if ($user->level == 'user') {
                return redirect('rental');
            } elseif ($user->level == 'admin') {
                return redirect('hadmin');
            } elseif ($user->level == 'admin_rental') {
                return redirect('rhome');
            }
        }
        return back()->with('failed', 'Maaf, terjadi kesalahan, coba kembali beberapa saat!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function register()
    {
        return view('daftar.register');
    }

    public function postr(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'umur' => 'required',
            'nohp' => 'required',
            'alamat' => 'required',
            'jk' => 'required',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'level' => 'user',
            'password' => Hash::make($request->password),
            'umur' => $request->umur,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
            'jk' => $request->jk,
        ]);

        if ($user) {
            return redirect('/login')->with('success', 'Akun berhasil dibuat, silahkan melakukan proses login!');
        } else {
            return back()->with('failed', 'Maaf, terjadi kesalahan, coba kembali beberapa saat!');
        }
    }
}
