<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pertanyaan
 * 
 * @property string $id_pertanyaan
 * @property string $redaksi
 * @property string $referensi
 * @property string $jawab
 * @property string $tipe
 *
 * @package App\Models\Base
 */
class Pertanyaan extends Model
{
	protected $table = 'pertanyaan';
	protected $primaryKey = 'id_pertanyaan';
	public $incrementing = false;
	public $timestamps = false;
}
