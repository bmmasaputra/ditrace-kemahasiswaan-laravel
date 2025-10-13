<?php

namespace App\Models;

use App\Models\Base\Borang4 as BaseBorang4;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Borang4 extends BaseBorang4
{
	protected $fillable = [
		'nim',
		'f21',
		'f22',
		'f23',
		'f24',
		'f25',
		'f26',
		'f27',
		'timestamp'
	];

	public function identita(): BelongsTo
	{
		return $this->belongsTo(Identita::class, 'nim', 'nim');
	}
}
