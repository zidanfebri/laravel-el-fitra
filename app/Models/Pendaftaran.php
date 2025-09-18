<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftarans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'jenis_pendaftaran', 'jenjang', 'tingkat', 'nama_siswa', 'tanggal_lahir', 'jenis_kelamin',
        'nama_ayah', 'nama_ibu', 'pekerjaan_ayah', 'pekerjaan_ibu', 'pendidikan_ayah', 'pendidikan_ibu',
        'no_hp', 'no_whatsapp', 'alamat_email', 'sumber_informasi', 'akte_path', 'kk_path', 'mutasi_path',
        'alamat', 'rt', 'rw', 'kelurahan', 'kecamatan', 'kota', 'provinsi', 'penyakit_bawaan', 'tinggi',
        'berat_badan', 'anak_ke', 'jumlah_saudara', 'tanggal_pendaftaran'
    ];
    public $timestamps = true;
}