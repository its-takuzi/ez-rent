<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\rental;
use App\Models\mobil;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class rentalcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $user = Auth::user();
        $rental = rental::latest()->paginate(5);
        return view('rental.index', compact('user', 'rental'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'namarental'    => 'required',
            'alamat'        => 'required',
            'nohp'          => 'required',
            'deskripsi'     => 'required',
            'gambar'        => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'user_id'       => 'required'

        ]);

        $gambar = $request->file('gambar');
        $gambar->storeAs('public/fpto', $gambar->hashName());


        rental::create([
            'namarental'    => $request->namarental,
            'alamat'        => $request->alamat,
            'nohp'          => $request->nohp,
            'deskripsi'     => $request->deskripsi,
            'user_id'       => $request->user_id,
            'gambar'        => $gambar->hashName(),
        ]);
        return redirect()->route('hadmin')->with(['success' => 'Data Berhasil di rubah!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //mendapatkan id
        $rental = rental::findOrFail($id);
        $mobil = mobil::where('rental_id', $rental->id)->latest()->paginate(100);

        //mengembalikan ke halaman show
        return view('admin.show', compact('rental', 'mobil'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        //
        $rental = rental::findOrFail($id);
        return view('admin.edit', compact('rental'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {

        $this->validate($request, [
            'namarental'    => 'required',
            'alamat'        => 'required',
            'nohp'          => 'required',
            'deskripsi'     => 'required',
            'gambar'        => 'required|image|mimes:jpeg,jpg,png|max:2048'

        ]);


        $rental = rental::findOrFail($id);


        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/fpto', $gambar->hashName());

            //delete old image
            Storage::delete('public/fpto' . $rental->gambar);

            $rental->update([
                'namarental'    => $request->namarental,
                'alamat'        => $request->alamat,
                'nohp'          => $request->nohp,
                'deskripsi'     => $request->deskripsi,
                'gambar'        => $gambar->hashName(),
            ]);
        } else {
            $rental->update([
                'namarental'    => $request->namarental,
                'alamat'        => $request->alamat,
                'nohp'          => $request->nohp,
                'deskripsi'     => $request->deskripsi,
            ]);
        }
        return redirect()->route('hadmin')->with(['success' => 'Data Berhasil di rubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $rental = rental::findOrFail($id);
        Storage::delete('public/fpto' . $rental->gambar);

        $rental->delete();
        $rental->mobil()->delete();

        return redirect()->back()->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
