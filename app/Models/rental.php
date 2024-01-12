<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rental extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */

    protected $fillable = [
        'namarental',
        'alamat',
        'nohp',
        'deskripsi',
        'gambar',
        'user_id'
    ];

    public function mobils()
    {
        return $this->belongsTo(mobil::class, 'rental_id');
    }
    public function pemesanans()
    {
        return $this->hasMany(pemesanan::class, 'rental_id');
    }
    public function user()
    {
        return $this->belongsTo(user::class, 'user_id');
    }
}
