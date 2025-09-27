<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Daerah
 * 
 * @property string $id_daerah
 * @property string $id_prov
 * @property string $id_prov2
 * @property string $daerah
 *
 * @package App\Models\Base
 */
class Daerah extends Model
{
	protected $table = 'daerah';
	protected $primaryKey = 'id_daerah';
	public $incrementing = false;
	public $timestamps = false;
}
