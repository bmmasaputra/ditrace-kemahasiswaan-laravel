<?php

namespace App\Models;

use App\Models\Base\Afoto as BaseAfoto;

class Afoto extends BaseAfoto
{
	protected $fillable = [
		'id_Alumni',
		'foto'
	];
}
