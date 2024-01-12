<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\rental;
use App\Models\mobil;
use App\Models\pemesanan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class admincontroller extends Controller
{

    public function hadmin(): view
    {
        $user = user::all();
        $rental = rental::latest()->paginate(5);
        return view('admin.ahome', compact('user', 'rental'));
    }

    public function regisa()
    {
        return view('admin.tambaha');
    }
    public function posta(Request $request)
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
            'level' => $request->level,
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

    public function hapususer($id): RedirectResponse
    {
        $user = user::findOrFail($id);

        $user->delete();

        return redirect()->back()->with(['success' => 'Data Berhasil Dihapus!']);
    }


    public function rhome(): View
    {
        $rental = rental::latest()->paginate(5);
        return view('radmin.rhome', compact('rental'));
    }

    public function rshow(string $id)
    {
        // Mendapatkan id
        $rental = Rental::findOrFail($id);

        // cek user_id
        if (Auth::user()->id !== (int)$rental->user_id) {
            // jika user_id tidak sama dengan user id
            return redirect()->back()->with('error', 'Anda bukan pemilik tempat rental');
        }

        $mobil = Mobil::where('rental_id', $rental->id)->latest()->paginate(100);
        return view('radmin.rshow', compact('rental', 'mobil'));
    }

    public function pesanan(String $id)
    {
        $rental = rental::findOrFail($id);
        $pemesanan = Pemesanan::with('mobil')->where('rental_id', $rental->id)->latest()->paginate(100);
        return view('radmin.pesanan', compact('rental', 'pemesanan',));
    }

    public function terima(String $id): RedirectResponse
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->update(['status' => 'diterima']);

        return redirect()->back()->with(['success' => 'Pesanan Sudah Di terima!']);
    }

    public function tolak(String $id): RedirectResponse
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->update(['status' => 'ditolak']);
        return redirect()->back()->with(['success' => 'Pesanan Sudah Di Tolak!']);
    }

    public function hapus(String $id): RedirectResponse
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $mobilId = $pemesanan->mobil_id;
        $pemesanan->delete();
        // Update mobil status to 'tersedia'
        $car = mobil::findOrFail($mobilId);
        $car->update(['status' => 'tersedia']);

        return redirect()->back()->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function cod(String $id): RedirectResponse
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->update(['pembayaran' => 'COD']);
        return redirect()->back()->with(['success' => 'Type Pembayaran Sudah Di Rubah!']);
    }


    public function transfer(String $id): RedirectResponse
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->update(['pembayaran' => 'Transfer']);
        return redirect()->back()->with(['success' => 'Type Pembayaran Sudah Di Rubah!']);
    }


    //hitung jumlah hari
    public function hitungJumlahHari(Request $request)
    {
        $request->validate([
            'tgl_pemesanan' => 'required|date',
            'tgl_pengembalian' => 'required|date',
        ]);

        $tglPengambilan = new \DateTime($request->tgl_pemesanan);
        $tglPengembalian = new \DateTime($request->tgl_pengembalian);

        $interval = $tglPengambilan->diff($tglPengembalian);
        $hari = $interval->days;

        return response()->json(['hari' => $hari]);
    }
}
