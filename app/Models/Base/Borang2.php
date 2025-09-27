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
 * @property string $f18a
 * @property string $f18b
 * @property string $f18c
 * @property string $f18d
 * @property string $f1201
 * @property string $f1202
 * @property string $f14
 * @property string $f15
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
		'timestamp' => 'datetime'
	];
}
