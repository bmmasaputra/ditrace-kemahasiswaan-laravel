<?php

namespace App\Models;

use App\Models\Base\Borang2 as BaseBorang2;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Borang2 extends BaseBorang2
{
	protected $fillable = [
		'nim',
		'f18a',
		'f18b',
		'f18c',
		'f18d',
		'f1201',
		'f1202',
		'f14',
		'f15',
		'timestamp'
	];

	public function identita(): BelongsTo
	{
		return $this->belongsTo(Identita::class, 'nim', 'nim');
	}
}
