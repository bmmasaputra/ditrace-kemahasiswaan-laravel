<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Borang4
 * 
 * @property string $nim
 * @property string $f21
 * @property string $f22
 * @property string $f23
 * @property string $f24
 * @property string $f25
 * @property string $f26
 * @property string $f27
 * @property Carbon $timestamp
 *
 * @package App\Models\Base
 */
class Borang4 extends Model
{
	protected $table = 'borang4';
	protected $primaryKey = 'nim';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'timestamp' => 'datetime'
	];
}
