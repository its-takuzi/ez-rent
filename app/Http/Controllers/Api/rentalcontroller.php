<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\rental;
use App\Http\Resources\rentalres;
use App\Http\Resources\showrental;
use App\Models\mobil;
use Illuminate\Support\Facades\Storage;
use illuminate\support\Facades\Validator;

class rentalcontroller extends Controller
{
    public function index()
    {
        // mengambil data rental 
        $rental = rental::latest()->paginate(5);

        //mengambalikan collection rental ke resources
        return new rentalres(true, 'List Data Rental', $rental);
    }

    public function store(Request $request)
    {
        $request->validate([
            'namarental'    => 'required',
            'alamat'        => 'required',
            'nohp'          => 'required',
            'deskripsi'     => 'required',
            'gambar'        => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        $gambar = $request->file('gambar');
        $gambar->storeAs('public/fpto', $gambar->hashName());

        rental::create([
            'namarental'    => $request->namarental,
            'alamat'        => $request->alamat,
            'nohp'          => $request->nohp,
            'deskripsi'     => $request->deskripsi,
            'gambar'        => $gambar->hashName(),
        ]);

        return response()->json(['message' => 'Data Berhasil Disimpan!']);
    }

    public function show($id)
    {
        $rental = rental::with('mobils')->findOrFail($id);
        return response()->json(['data' => new ShowRental($rental)], 200);
    }

    public function update(Request $request, $id)
    {
        // Validator
        $request->validate([
            'namarental' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'sometimes|required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        // Cari rental berdasarkan ID
        $rental = rental::findOrFail($id);

        if ($request->hasFile('gambar')) {

            $gambar = $request->file('gambar');
            $gambar->storeAs('public/fpto', $gambar->hashName());
            Storage::delete('public/fpto/' . $rental->gambar);

            // Update data dengan gambar baru
            $rental->update([
                'namarental' => $request->namarental,
                'alamat' => $request->alamat,
                'nohp' => $request->nohp,
                'deskripsi' => $request->deskripsi,
                'gambar' => $gambar->hashName(),
            ]);
        } else {
            // Jika tidak ada file gambar baru, hanya update data lainnya
            $rental->update([
                'namarental' => $request->namarental,
                'alamat' => $request->alamat,
                'nohp' => $request->nohp,
                'deskripsi' => $request->deskripsi,
            ]);
        }

        // Beri respons JSON
        return response()->json(['message' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $rental = Rental::findOrFail($id);
        Storage::delete('public/fpto/' . $rental->gambar);
        $rental->delete();
        $rental->mobils()->delete();
        return response()->json(['message' => 'Data Berhasil Dihapus!']);
    }
}
