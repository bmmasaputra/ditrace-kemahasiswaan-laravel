<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Borang2
 * 
 * @property string $nim
 * @property string|null $f18a
 * @property string|null $f18b
 * @property string|null $f18c
 * @property Carbon|null $f18d
 * @property string|null $f1201
 * @property string|null $f1202
 * @property string|null $f14
 * @property string|null $f15
 * @property Carbon $timestamp
 *
 * @package App\Models\Base
 */
class Borang2 extends Model
{
	protected $table = 'borang2';
	protected $primaryKey = 'nim';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'f18d' => 'datetime',
		'timestamp' => 'datetime'
	];
}
