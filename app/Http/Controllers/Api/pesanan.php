<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\cekpesanan;
use App\Models\mobil;
use App\Models\pemesanan;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class pesanan extends Controller
{
    public function cekpesanan(String $id)
    {
        $user = User::findOrFail($id);
        $pemesanan = Pemesanan::with(['mobil', 'rental'])->where('user_id', $user->id)->latest()->paginate(100);

        return response()->json(['user' => $user, 'pemesanan' => cekpesanan::collection($pemesanan)], 200);
    }

    public function hapuspesanan(string $id): JsonResponse
    {
        try {
            $pemesanan = Pemesanan::findOrFail($id);
            $mobilId = $pemesanan->mobil_id;
            $pemesanan->delete();

            // Update mobil status to 'tersedia'
            $car = mobil::findOrFail($mobilId);
            $car->update(['status' => 'tersedia']);

            return response()->json(['message' => 'Data Berhasil Dihapus!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menghapus data.'], 500);
        }
    }
}
