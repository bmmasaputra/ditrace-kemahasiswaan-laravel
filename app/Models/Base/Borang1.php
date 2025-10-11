<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Borang1
 * 
 * @property string $nim
 * @property string $f8
 * @property string|null $f504
 * @property string|null $f502
 * @property string|null $f505
 * @property string|null $f506
 * @property string|null $f5a1
 * @property string|null $f5a2
 * @property string|null $f1101
 * @property string|null $f1102
 * @property string|null $f5b
 * @property string|null $f5c
 * @property string|null $f5d
 * @property Carbon $timestamp
 *
 * @package App\Models\Base
 */
class Borang1 extends Model
{
	protected $table = 'borang1';
	protected $primaryKey = 'nim';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'timestamp' => 'datetime'
	];
}
