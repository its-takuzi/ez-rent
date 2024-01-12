<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mobil;
use App\Models\rental;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class usercontroller extends Controller
{
    public function ushow(string $id)
    {
        //mendapatkan id
        $user = Auth::user();
        $rental = rental::findOrFail($id);
        $mobil = mobil::where('rental_id', $rental->id)->latest()->paginate(100);

        //mengembalikan ke halaman show
        return view('rental.show', compact('rental', 'mobil', 'user'));
    }
}
