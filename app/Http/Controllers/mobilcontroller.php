<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\rental;
use App\Models\mobil;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class mobilcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $rental = rental::class;
        $mobil = mobil::latest()->paginate(5);
        return view('rental.show', compact('mobil', 'rental'));
    }

    /**
     * Show the form for creating a new resource.
     */


    public function create($rental_id)
    {
        // Ambil data rental berdasarkan ID
        $rental = Rental::find($rental_id);

        // Pastikan rental dengan ID yang diberikan ditemukan
        if (!$rental) {
            abort(404, 'Rental not found');
        }

        // Kirim data rental ke view mobil.create
        return view('mobil.create', compact('rental'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'plat_mobil'        => 'required',
            'merk_mobil'        => 'required',
            'bahan_bakar'       => 'required',
            'muatan'            => 'required',
            'gambar'            => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'harga_per_hari'    => 'required',
            'status'            => 'required',
            'rental_id'         => 'required|exists:rentals,id'
        ]);
        $gambar = $request->file('gambar');
        $gambar->storeAs('public/fpto', $gambar->hashName());
        $mobil = new mobil();
        mobil::create([
            'plat_mobil'        => $request->plat_mobil,
            'merk_mobil'        => $request->merk_mobil,
            'bahan_bakar'       => $request->bahan_bakar,
            'muatan'            => $request->muatan,
            'gambar'            => $gambar->hashName(),
            'harga_per_hari'    => $request->harga_per_hari,
            'status'            => $request->status,
            'rental_id'         => $request->rental_id,
        ]);
        if ($mobil) {
            return back()->with('success', 'Data peminjaman berhasil di hapus!');
        } else {
            return back()->with('failed', 'Gagal menghapus data peminjaman!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(mobil $mobil)
    {
        // Mendapatkan ID rental dari mobil
        $rental_id = $mobil->rental_id;

        // Mengarahkan ke halaman rental.show dengan parameter ID rental
        return redirect()->route('rental.show', ['id' => $rental_id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $mobil = mobil::findOrFail($id);
        return view('mobil.edit', compact('mobil', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, string $id): RedirectResponse
    {

        $this->validate($request, [
            'plat_mobil'        => 'required',
            'merk_mobil'        => 'required',
            'bahan_bakar'       => 'required',
            'muatan'            => 'required',
            'gambar'            => 'image|mimes:jpeg,jpg,png|max:2048',
            'harga_per_hari'    => 'required',
            'status'            => 'required',
            'rental_id'         => 'required',
        ]);

        $mobil = mobil::findOrFail($id);

        // Only update the image if a new one is provided
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarPath = $gambar->storeAs('public/fpto', $gambar->hashName());

            // Delete old image
            Storage::delete('public/fpto/' . $mobil->gambar);

            $mobil->gambar = $gambarPath;
        }

        $mobil->update([
            'plat_mobil'        => $request->plat_mobil,
            'merk_mobil'        => $request->merk_mobil,
            'bahan_bakar'       => $request->bahan_bakar,
            'muatan'            => $request->muatan,
            'harga_per_hari'    => $request->harga_per_hari,
            'status'            => $request->status,
            'rental_id'         => $request->rental_id,
        ]);
        return back()->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $data = mobil::find($id);

        $data->delete();

        if ($data) {
            return back()->with('success', 'Data peminjaman berhasil di hapus!');
        } else {
            return back()->with('failed', 'Gagal menghapus data peminjaman!');
        }
    }
}
