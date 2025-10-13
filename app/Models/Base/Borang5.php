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
 * @property string|null $f301
 * @property string|null $f302
 * @property string|null $f303
 * @property int $f401
 * @property int $f402
 * @property int $f403
 * @property int $f404
 * @property int $f405
 * @property int $f406
 * @property int $f407
 * @property int $f408
 * @property int $f409
 * @property int $f410
 * @property int $f411
 * @property int $f412
 * @property int $f413
 * @property int $f414
 * @property int $f415
 * @property int $f416
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
		'f401' => 'int',
		'f402' => 'int',
		'f403' => 'int',
		'f404' => 'int',
		'f405' => 'int',
		'f406' => 'int',
		'f407' => 'int',
		'f408' => 'int',
		'f409' => 'int',
		'f410' => 'int',
		'f411' => 'int',
		'f412' => 'int',
		'f413' => 'int',
		'f414' => 'int',
		'f415' => 'int',
		'f416' => 'int',
		'timestamp' => 'datetime'
	];
}
