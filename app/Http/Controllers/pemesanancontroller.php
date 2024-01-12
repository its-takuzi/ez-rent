<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mobil;
use App\Models\pemesanan;
use App\Models\rental;
use App\models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class pemesanancontroller extends Controller
{
    public function pemesanan($rental_id, mobil $mobil)
    {
        $user = Auth::user();
        $rental = Rental::findOrFail($rental_id);

        return view('rental.pemesanan', compact('mobil', 'user', 'rental'));
    }

    public function storep(Request $request): RedirectResponse
    {
        // Validasi input
        $request->validate([
            'mobil_id' => 'required',
            'rental_id' => 'required',
            'tgl_pemesanan' => 'required|date',
            'tgl_pengembalian' => 'required|date|after:tgl_pemesanan',
            'hari' => 'required'
        ]);

        $pemesanan = new pemesanan();
        $user = auth()->user();
        $car = mobil::find($request->mobil_id);
        $rental = Rental::find($request->rental_id);
        if (!$rental) {
            return back()->with('failed', 'Rental tidak ditemukan.');
        }
        $harga = $car->harga_per_hari;

        if (!$car || $car->status != 'tersedia') {
            return back()->with('failed', 'Mobil tidak tersedia untuk pemesanan.');
        }

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' =>  uniqid(),
                'gross_amount' => $request->hari * $harga,
            ),
            'customer_details' => array(
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // Store $snapToken in the session
        $request->session()->put('snapToken', $snapToken);
        // Buat pemesanan baru
        $pemesanan = pemesanan::create([
            'mobil_id' => $request->mobil_id,
            'rental_id' => $request->rental_id,
            'tgl_pemesanan' => $request->tgl_pemesanan,
            'tgl_pengembalian' => $request->tgl_pengembalian,
            'hari' => $request->hari,
            'user_id' => auth()->user()->id,
            'status' => 'menunggu',
            'total_harga' => $request->hari * $harga,
            'pembayaran' => 'menunggu',
            'snap_token' => $snapToken,
        ]);
        $car->update(['status' => 'terpakai']);

        if ($pemesanan) {
            return redirect()->route('rental.index', ['pemesanan' => $pemesanan, 'snapToken' => $snapToken]);
        } else {
            return back()->with('failed', 'Gagal menambah data peminjaman!');
        }
    }

    public function showpemesanan(String $id)
    {
        $user = User::findOrFail($id);
        $pemesanan = Pemesanan::with('mobil', 'rental')->where('user_id', $user->id)->latest()->paginate(100);
        $snapToken = session('snapToken');

        return view('rental.cekpemesanan', compact('user', 'pemesanan', 'snapToken'));
    }

    public function deletep(string $id): RedirectResponse
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $mobilId = $pemesanan->mobil_id;
        $pemesanan->delete();

        $car = mobil::findOrFail($mobilId);
        $car->update(['status' => 'tersedia']);

        return redirect()->back()->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
