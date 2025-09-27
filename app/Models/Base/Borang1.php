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
 * @property string $f504
 * @property string $f502
 * @property string $f505
 * @property string $f506
 * @property string $f5a1
 * @property string $f5a2
 * @property string $f1101
 * @property string $f1102
 * @property string $f5b
 * @property string $f5c
 * @property string $f5d
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
