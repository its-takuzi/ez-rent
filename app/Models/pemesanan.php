<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemesanan extends Model
{

    use HasFactory;
    /**
     * fillable
     *
     * @var array
     */

    protected $fillable = [
        'user_id',
        'mobil_id',
        'rental_id',
        'tgl_pemesanan',
        'tgl_pengembalian',
        'hari',
        'total_harga',
        'status',
        'pembayaran',
        'snap_token',
    ];

    public function user()
    {
        return $this->belongsTo(user::class);
    }
    public function mobil()
    {
        return $this->belongsTo(mobil::class);
    }
    public function rental()
    {
        return $this->belongsTo(rental::class);
    }
}
