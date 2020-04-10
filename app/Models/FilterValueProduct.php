<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FilterValueProduct
 * 
 * @property int $id
 * @property int $product_id
 * @property int $filter_value_id
 * 
 * @property FilterValue $filter_value
 * @property Product $product
 *
 * @package App\Models
 */
class FilterValueProduct extends Model
{
	protected $table = 'filter_value_product';
	public $timestamps = false;

	protected $casts = [
		'product_id' => 'int',
		'filter_value_id' => 'int'
	];

	protected $fillable = [
		'product_id',
		'filter_value_id'
	];

	public function filter_value()
	{
		return $this->belongsTo(FilterValue::class);
	}

	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
