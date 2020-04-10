<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FilterValue
 * 
 * @property int $id
 * @property string $value
 * @property int $filter_group_id
 * 
 * @property FilterGroup $filter_group
 * @property Collection|Product[] $products
 *
 * @package App\Models
 */
class FilterValue extends Model
{
	protected $table = 'filter_values';
	public $timestamps = false;

	protected $casts = [
		'filter_group_id' => 'int'
	];

	protected $fillable = [
		'value',
		'filter_group_id'
	];

	public function filter_group()
	{
		return $this->belongsTo(FilterGroup::class);
	}

	public function products()
	{
		return $this->belongsToMany(Product::class)
					->withPivot('id');
	}
}
