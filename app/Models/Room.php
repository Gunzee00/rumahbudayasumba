<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'room'; // nama tabel

    protected $fillable = [
        'name_room',
        'price',
        'jumlah_kamar',
        'jumlah_tamu',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
        'image6',
        'image7',
        'image8',
        'image9',
        'image10',
        'fasilitas1',
        'fasilitas2',
        'fasilitas3',
        'fasilitas4',
        'fasilitas5',
        'fasilitas6',
        'fasilitas7',
        'fasilitas8',
        'fasilitas9',
        'fasilitas10',
        'desc',
    ];
}
