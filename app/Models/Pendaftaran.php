<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftarans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tahun_ajaran_id',
        'jenis_pendaftaran',
        'jenjang',
        'tingkat',
        'nama_siswa',
        'tanggal_lahir',
        'jenis_kelamin',
        'nisn',
        'tempat_lahir',
        'asal_sekolah',
        'agama',
        'golongan_darah',
        'kode_pos',
        'nama_ayah',
        'nama_ibu',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'pendidikan_ayah',
        'pendidikan_ibu',
        'no_hp',
        'no_whatsapp',
        'alamat_email',
        'sumber_informasi',
        'status',
        'akte_path',
        'kk_path',
        'mutasi_path',
        'transkip1_path',
        'transkip2_path',
        'transkip3_path',
        'transkip4_path',
        'transkip5_path',
        'bukti_pembayaran_path',
        'alamat',
        'rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'kota',
        'provinsi',
        'penyakit_bawaan',
        'tinggi',
        'berat_badan',
        'anak_ke',
        'jumlah_saudara',
        'tanggal_pendaftaran',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_pendaftaran' => 'datetime',
        'tinggi' => 'decimal:2',
        'berat_badan' => 'decimal:2',
    ];

    public $timestamps = true;

    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class, 'tahun_ajaran_id');
    }

    // Scope untuk status
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }
}