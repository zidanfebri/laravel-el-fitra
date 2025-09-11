<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftarans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'jenis_pendaftaran', 'jenjang', 'tingkat', 'nama_siswa', 'tanggal_lahir', 'jenis_kelamin',
        'nama_ayah', 'nama_ibu', 'nomor_telepon', 'akte_path', 'kk_path', 'mutasi_path'
    ];
    public $timestamps = true; // Pastikan ini true jika menggunakan created_at dan updated_at
}