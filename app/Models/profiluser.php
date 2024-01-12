<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profiluser extends Model
{
    use HasFactory;
    /**
     * fillable
     *
     * @var array
     */

    protected $fillable = [
        'nama',
        'umur',
        'nohp',
        'alamat',
        'ktp',
        'pp',
        'jk',
        'user_id'
    ];
}
