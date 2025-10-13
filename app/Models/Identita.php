<?php

namespace App\Models;

use App\Models\Base\Identita as BaseIdentita;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

	public function borang1(): HasOne
	{
		return $this->hasOne(Borang1::class, 'nim', 'nim');
	}

	public function borang2(): HasOne
	{
		return $this->hasOne(Borang2::class, 'nim', 'nim');
	}

	public function borang3(): HasOne
	{
		return $this->hasOne(Borang3::class, 'nim', 'nim');
	}

	public function borang4(): HasOne
	{
		return $this->hasOne(Borang4::class, 'nim', 'nim');
	}

	public function borang5(): HasOne
	{
		return $this->hasOne(Borang5::class, 'nim', 'nim');
	}

	public function borang6(): HasOne
	{
		return $this->hasOne(Borang6::class, 'nim', 'nim');
	}
}
