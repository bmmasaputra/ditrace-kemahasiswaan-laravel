<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Afoto
 * 
 * @property string $id_Alumni
 * @property string $foto
 *
 * @package App\Models\Base
 */
class Afoto extends Model
{
	protected $table = 'afoto';
	protected $primaryKey = 'id_Alumni';
	public $incrementing = false;
	public $timestamps = false;
}
