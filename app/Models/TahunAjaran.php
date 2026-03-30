<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    protected $table = 'tahun_ajarans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tahun_ajaran',
        'keterangan',
        'tanggal_mulai',
        'tanggal_akhir',
        'status',
    ];
    public $timestamps = true;

    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class, 'tahun_ajaran_id');
    }
}