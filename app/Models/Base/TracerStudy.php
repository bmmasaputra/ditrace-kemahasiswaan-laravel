<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TracerStudy
 * 
 * @property string $nim
 * @property string $fakultas
 * @property string $prodi
 * @property int|null $thn_lulus
 * @property string $nama
 * @property string|null $domisili
 * @property string|null $daerah
 * @property string|null $alamat
 * @property string|null $no_telp
 * @property string|null $mail
 * @property string|null $nik
 * @property string|null $npwp
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
 * @property string|null $f18a
 * @property string|null $f18b
 * @property string|null $f18c
 * @property Carbon|null $f18d
 * @property string|null $f1201
 * @property string|null $f1202
 * @property string|null $f14
 * @property string|null $f15
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
 * @property string $f21
 * @property string $f22
 * @property string $f23
 * @property string $f24
 * @property string $f25
 * @property string $f26
 * @property string $f27
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
class TracerStudy extends Model
{
	protected $table = 'tracer_study';
	protected $primaryKey = 'nim';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'thn_lulus' => 'int',
		'f18d' => 'datetime',
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
