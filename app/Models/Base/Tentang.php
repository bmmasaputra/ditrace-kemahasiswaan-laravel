<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tentang
 * 
 * @property int $id
 * @property string $redaksi
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class Tentang extends Model
{
	protected $table = 'tentang';
	public $timestamps = false;
}
