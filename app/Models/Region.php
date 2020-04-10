<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Region
 * 
 * @property int $id
 * @property string $name
 * @property string $deleted_at
 * 
 * @property Collection|City[] $cities
 *
 * @package App\Models
 */
class Region extends Model
{
	use SoftDeletes;
	protected $table = 'regions';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function cities()
	{
		return $this->hasMany(City::class);
	}
}
