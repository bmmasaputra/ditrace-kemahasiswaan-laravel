<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Kontak
 * 
 * @property int $id
 * @property string $mail
 * @property string $phone
 *
 * @package App\Models\Base
 */
class Kontak extends Model
{
	protected $table = 'kontak';
	protected $primaryKey = 'id';
	protected $keyType = 'int';
	public $incrementing = true;
	public $timestamps = false;
}
