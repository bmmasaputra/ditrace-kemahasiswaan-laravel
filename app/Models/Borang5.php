<?php

namespace App\Models;

use App\Models\Base\Borang5 as BaseBorang5;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Borang5 extends BaseBorang5
{
	protected $fillable = [
		'nim',
		'f301',
		'f302',
		'f303',
		'f401',
		'f402',
		'f403',
		'f404',
		'f405',
		'f406',
		'f407',
		'f408',
		'f409',
		'f410',
		'f411',
		'f412',
		'f413',
		'f414',
		'f415',
		'f416',
		'timestamp'
	];

	protected $casts = [
		'f301' => 'boolean',
		'f302' => 'boolean',
		'f303' => 'boolean',
		'f401' => 'boolean',
		'f402' => 'boolean',
		'f403' => 'boolean',
		'f404' => 'boolean',
		'f405' => 'boolean',
		'f406' => 'boolean',
		'f407' => 'boolean',
		'f408' => 'boolean',
		'f409' => 'boolean',
		'f410' => 'boolean',
		'f411' => 'boolean',
		'f412' => 'boolean',
		'f413' => 'boolean',
		'f414' => 'boolean',
		'f415' => 'boolean',
		'f416' => 'boolean',
		'timestamp' => 'datetime',
	];

	public function identita(): BelongsTo
	{
		return $this->belongsTo(Identita::class, 'nim', 'nim');
	}
}
