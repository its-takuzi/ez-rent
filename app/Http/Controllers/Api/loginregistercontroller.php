<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class loginregistercontroller extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:8|max:20'
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['email tidak ada atau password anda salah'],
            ]);
        }

        return $user->createToken('user token')->plainTextToken;
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
    }

    public function register(Request $request)
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

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'level' => 'user',
            'password' => Hash::make($request->password),
            'umur' => $request->umur,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
            'jk' => $request->jk,
        ]);
        return response()->json(['message' => 'anda berhasil register akun'], 201);
    }
}
