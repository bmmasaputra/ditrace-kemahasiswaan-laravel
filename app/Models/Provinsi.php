<?php

namespace App\Models;

use App\Models\Base\Provinsi as BaseProvinsi;

class Provinsi extends BaseProvinsi
{
	protected $fillable = [
		'id',
		'id_prov',
		'provinsi'
	];

	protected $casts = [
		'id' => 'string',
		'id_prov' => 'string',
	];
}
