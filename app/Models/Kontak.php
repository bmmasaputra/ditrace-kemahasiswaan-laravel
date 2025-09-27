<?php

namespace App\Models;

use App\Models\Base\Kontak as BaseKontak;

class Kontak extends BaseKontak
{
	protected $fillable = [
		'mail',
		'phone'
	];
}
