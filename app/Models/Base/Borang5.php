<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Borang5
 * 
 * @property string $nim
 * @property string $f301
 * @property string $f302
 * @property string $f303
 * @property string $f401
 * @property string $f1402
 * @property string $f403
 * @property string $f404
 * @property string $f405
 * @property string $f406
 * @property string $f407
 * @property string $f408
 * @property string $f409
 * @property string $f410
 * @property string $f411
 * @property string $f412
 * @property string $f413
 * @property string $f414
 * @property string $f415
 * @property string $f416
 * @property Carbon $timestamp
 *
 * @package App\Models\Base
 */
class Borang5 extends Model
{
	protected $table = 'borang5';
	protected $primaryKey = 'nim';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'timestamp' => 'datetime'
	];
}
