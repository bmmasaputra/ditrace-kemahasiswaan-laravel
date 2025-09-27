<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Identita
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
 *
 * @package App\Models\Base
 */
class Identita extends Model
{
	protected $table = 'identitas';
	protected $primaryKey = 'nim';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'thn_lulus' => 'int'
	];
}
