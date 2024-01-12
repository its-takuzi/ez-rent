<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class showrental extends JsonResource
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
            'namarental' => $this->namarental,
            'alamat' => $this->alamat,
            'noho' => $this->nohp,
            'deskripsi' => $this->deskripsi,
            'gambar' => $this->gambar,
            'mobil' => mobilresource::collection($this->mobils),
        ];
    }
}
