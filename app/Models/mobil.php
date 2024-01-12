<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mobil extends Model
{
    use HasFactory;
    /**
     * fillable
     *
     * @var array
     */

    protected $fillable = [
        'plat_mobil',
        'merk_mobil',
        'bahan_bakar',
        'muatan',
        'gambar',
        'harga_per_hari',
        'status',
        'rental_id',
    ];

    public function rental()
    {
        return $this->belongsTo(rental::class, 'rental_id');
    }
    public function pemesanan()
    {
        return $this->hasMany(pemesanan::class, 'mobil_id');
    }
}
