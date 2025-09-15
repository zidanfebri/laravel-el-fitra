<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'judul_en',
        'deskripsi',
        'deskripsi_en',
        'tanggal_terbit',
        'gambar',
    ];

    protected $dates = [
        'tanggal_terbit',
    ];
}