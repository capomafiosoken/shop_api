<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FilterGroup
 * 
 * @property int $id
 * @property string $name
 * 
 * @property Collection|FilterValue[] $filter_values
 *
 * @package App\Models
 */
class FilterGroup extends Model
{
	protected $table = 'filter_groups';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function filter_values()
	{
		return $this->hasMany(FilterValue::class);
	}
}
