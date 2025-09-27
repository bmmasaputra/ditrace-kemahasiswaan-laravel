<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Borang3
 * 
 * @property string $nim
 * @property string $f1761
 * @property string $f1762
 * @property string $f1763
 * @property string $f1764
 * @property string $f1765
 * @property string $f1766
 * @property string $f1767
 * @property string $f1768
 * @property string $f1769
 * @property string $f1770
 * @property string $f1771
 * @property string $f1772
 * @property string $f1773
 * @property string $f1774
 * @property Carbon $timestamp
 *
 * @package App\Models\Base
 */
class Borang3 extends Model
{
	protected $table = 'borang3';
	protected $primaryKey = 'nim';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'timestamp' => 'datetime'
	];
}
