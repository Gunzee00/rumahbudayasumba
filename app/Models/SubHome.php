<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubHome extends Model
{
    use HasFactory;

    protected $table = 'sub_home';

    protected $fillable = [
        'title',
        'sub_title',
        'description',
        'image1',
        'image2',
    ];
}
