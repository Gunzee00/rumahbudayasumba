<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // Pastikan sesuai dengan nama tabel
    protected $table = 'booking';

    // Kolom yang bisa diisi (fillable)
    protected $fillable = [
        'customer_name',
        'phone_number',
        'email',
        'room_id',
        'check_in',
        'check_out',
        'total_price',
        'guest_count',
        'special_request',
        'status',
    ];

    /**
     * Relasi ke Room
     */
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
