<?php

namespace App\Models;

use App\Models\Base\Borang6 as BaseBorang6;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Borang6 extends BaseBorang6
{
	protected $fillable = [
		'nim',
		'f6',
		'f7',
		'f7a',
		'f1001',
		'f1002',
		'f1601',
		'f1602',
		'f1603',
		'f1604',
		'f1605',
		'f1606',
		'f1607',
		'f1608',
		'f1609',
		'f1610',
		'f1611',
		'f1612',
		'f1613',
		'f1614',
		'timestamp'
	];

	protected $casts = [
		'f1601' => 'boolean',
		'f1602' => 'boolean',
		'f1603' => 'boolean',
		'f1604' => 'boolean',
		'f1605' => 'boolean',
		'f1606' => 'boolean',
		'f1607' => 'boolean',
		'f1608' => 'boolean',
		'f1609' => 'boolean',
		'f1610' => 'boolean',
		'f1611' => 'boolean',
		'f1612' => 'boolean',
		'f1613' => 'boolean',
		'f1614' => 'boolean',
		'timestamp' => 'datetime',
	];

	public function identita(): BelongsTo
	{
		return $this->belongsTo(Identita::class, 'nim', 'nim');
	}
}
