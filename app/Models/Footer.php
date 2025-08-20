<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;

    protected $table = 'footer'; // nama tabel di database
    protected $fillable = [
        'address',
        'email',
        'phone',
        'facebook',
        'youtube',
        'instagram',
    ];
}
