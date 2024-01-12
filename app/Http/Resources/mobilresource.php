<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class mobilresource extends JsonResource
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
            'plat_mobil' => $this->plat_mobil,
            'merk_mobil' => $this->merk_mobil,
            'bahan_bakar' => $this->bahan_bakar,
            'muatan' => $this->muatan,
            'gambar' => $this->gambar,
            'harga_per_hari' => $this->harga_per_hari,
            'status' => $this->status
        ];
    }
}
