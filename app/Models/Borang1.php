<?php

namespace App\Models;

use App\Models\Base\Borang1 as BaseBorang1;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Borang1 extends BaseBorang1
{
	protected $fillable = [
		'nim',
		'f8',
		'f504',
		'f502',
		'f505',
		'f506',
		'f5a1',
		'f5a2',
		'f1101',
		'f1102',
		'f5b',
		'f5c',
		'f5d',
		'timestamp'
	];

	public function identita(): BelongsTo
	{
		return $this->belongsTo(Identita::class, 'nim', 'nim');
	}
}
