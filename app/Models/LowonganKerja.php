<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LowonganKerja extends Model
{
    protected $table = 'lowongan_kerja';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'nama_perusahaan',
        'posisi',
        'provinsi',
        'daerah',
        'jenis_waktu',
        'lokasi_pengerjaan',
        'gaji_dari',
        'gaji_sampai',
        'link'
    ];
}
