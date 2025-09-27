<?php

namespace App\Models;

use App\Models\Base\Fakprodi as BaseFakprodi;

class Fakprodi extends BaseFakprodi
{
	protected $fillable = [
		'id_fakprodi',
		'prodi',
		'fakultas'
	];
}
