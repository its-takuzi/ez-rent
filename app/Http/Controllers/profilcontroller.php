<?php

namespace App\Http\Controllers;

use App\Models\profiluser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profilcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $profiluser = profiluser::all();
        return view('rental.profil', compact('profiluser', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profill.dprofil');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama'    => 'required',
            'umur'        => 'required',
            'nohp'          => 'required',
            'alamat'     => 'required',
            'ktp'        => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'pp'        => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'jk'     => 'required',
        ]);

        $ktp = $request->file('ktp');
        $ktp->storeAs('public/fpto', $ktp->hashName());

        $pp = $request->file('pp');
        $pp->storeAs('public/fpto', $pp->hashName());


        profiluser::create([
            'nama'    => $request->nama,
            'umur'        => $request->umur,
            'nohp'          => $request->nohp,
            'alamat'     => $request->alamat,
            'ktp'        => $ktp->hashName(),
            'pp'        => $pp->hashName(),
            'jk'     => $request->jk,
            'user_id'   => auth()->user()->id,
        ]);

        return redirect()->route('hadmin')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //mendapatkan id
        $profiluser = profiluser::findOrFail($id);
        //mengembalikan ke halaman show
        return view('profill.show', compact('profiluser'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
