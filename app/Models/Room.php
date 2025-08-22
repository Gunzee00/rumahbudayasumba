<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    // Nama tabel (opsional kalau menggunakan nama default 'rooms')
    protected $table = 'room';

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'name_room',
        'price',
        'image',
        'desc',
    ];
}
