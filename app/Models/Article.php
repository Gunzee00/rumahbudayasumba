<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // Nama tabel (opsional, kalau tidak sesuai konvensi)
    protected $table = 'articles';

    // Kolom yang bisa diisi mass-assignment
    protected $fillable = [
        'title',
        'description',
        'image',
    ];
}
