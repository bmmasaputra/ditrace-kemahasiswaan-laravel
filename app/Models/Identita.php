<?php

namespace App\Models;

use App\Models\Base\Identita as BaseIdentita;

class Identita extends BaseIdentita
{
	protected $fillable = [
		'nim',
		'fakultas',
		'prodi',
		'thn_lulus',
		'nama',
		'domisili',
		'daerah',
		'alamat',
		'no_telp',
		'mail',
		'nik',
		'npwp'
	];
}
