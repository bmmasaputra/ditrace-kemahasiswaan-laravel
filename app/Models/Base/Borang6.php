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
 * @property string $f6
 * @property string $f7
 * @property string $f7a
 * @property string $f1001
 * @property string $f1002
 * @property string $f1601
 * @property string $f1602
 * @property string $f1603
 * @property string $f1604
 * @property string $f1605
 * @property string $f1606
 * @property string $f1607
 * @property string $f1608
 * @property string $f1609
 * @property string $f1610
 * @property string $f1611
 * @property string $f1612
 * @property string $f1613
 * @property string $f1614
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
		'timestamp' => 'datetime'
	];
}
