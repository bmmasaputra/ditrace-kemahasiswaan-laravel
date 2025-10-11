<?php

namespace App\Models;

use App\Models\Base\Daerah as BaseDaerah;

class Daerah extends BaseDaerah
{
	protected $fillable = [
		'id_daerah',
		'id_prov',
		'id_prov2',
		'daerah'
	];

	protected $casts = [
		'id_daerah' => 'string',
		'id_prov' => 'string',
		'id_prov2' => 'string',
	];
}
