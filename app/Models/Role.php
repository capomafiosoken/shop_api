<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Role
 *
 * @property int $id
 * @property string $name
 * @property string $deleted_at
 *
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Role extends Model
{
	use SoftDeletes;
	protected $table = 'roles';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];
	protected $hidden = [
        'deleted_at',
        'id'
    ];

	public function users()
	{
		return $this->hasMany(User::class);
	}
}
