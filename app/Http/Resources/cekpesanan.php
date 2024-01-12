<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class cekpesanan extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'mobil' => [
                'id' => $this->mobil->id,
                'merk_mobil' => $this->mobil->merk_mobil,
            ],
            'rental' => [
                'namarental' => $this->rental->namarental,
            ],
            'mobil' => [
                'plat_mobil' => $this->mobil->plat_mobil,
            ],
            'tgl_pemesanan' => $this->tgl_pemesanan,
            'tgl_pengambilan' => $this->tgl_pengambilan,
            'status' => $this->status
        ];
    }
}
