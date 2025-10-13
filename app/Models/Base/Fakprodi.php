<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Fakprodi
 * 
 * @property string $id_fakprodi
 * @property string $prodi
 * @property string $fakultas
 *
 * @package App\Models\Base
 */
class Fakprodi extends Model
{
	protected $table = 'fakprodi';
	protected $primaryKey = 'id_fakprodi';
	public $incrementing = false;
	public $timestamps = false;
}
