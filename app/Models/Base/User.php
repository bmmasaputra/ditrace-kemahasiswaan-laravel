<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $username
 * @property string $nama
 * @property string $password
 * @property string $level
 * @property string $fakultas
 * @property string $jurusan
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class User extends Model
{
	protected $table = 'users';
	public $timestamps = false;
	public $incrementing = false;
}
