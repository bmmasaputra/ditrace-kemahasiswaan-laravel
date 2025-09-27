<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Provinsi
 * 
 * @property string $id
 * @property string $id_prov
 * @property string $provinsi
 *
 * @package App\Models\Base
 */
class Provinsi extends Model
{
	protected $table = 'provinsi';
	public $incrementing = false;
	public $timestamps = false;
}
