<?php

namespace App\Models;

use App\Models\Base\Pertanyaan as BasePertanyaan;

class Pertanyaan extends BasePertanyaan
{
	protected $fillable = [
		'id_pertanyaan',
		'redaksi',
		'referensi',
		'jawab',
		'tipe'
	];
}
