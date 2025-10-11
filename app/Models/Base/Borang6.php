<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Borang6
 * 
 * @property string $nim
 * @property string|null $f6
 * @property string|null $f7
 * @property string|null $f7a
 * @property string|null $f1001
 * @property string|null $f1002
 * @property int $f1601
 * @property int $f1602
 * @property int $f1603
 * @property int $f1604
 * @property int $f1605
 * @property int $f1606
 * @property int $f1607
 * @property int $f1608
 * @property int $f1609
 * @property int $f1610
 * @property int $f1611
 * @property int $f1612
 * @property int $f1613
 * @property int $f1614
 * @property Carbon $timestamp
 *
 * @package App\Models\Base
 */
class Borang6 extends Model
{
	protected $table = 'borang6';
	protected $primaryKey = 'nim';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'f1601' => 'int',
		'f1602' => 'int',
		'f1603' => 'int',
		'f1604' => 'int',
		'f1605' => 'int',
		'f1606' => 'int',
		'f1607' => 'int',
		'f1608' => 'int',
		'f1609' => 'int',
		'f1610' => 'int',
		'f1611' => 'int',
		'f1612' => 'int',
		'f1613' => 'int',
		'f1614' => 'int',
		'timestamp' => 'datetime'
	];
}
