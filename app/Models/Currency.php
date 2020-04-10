<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Currency
 * 
 * @property int $id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $name
 * @property string $code
 * @property string $symbol_left
 * @property string $symbol_right
 * @property float $value
 * @property string $base
 * @property string $deleted_at
 * 
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class Currency extends Model
{
	use SoftDeletes;
	protected $table = 'currencies';

	protected $casts = [
		'value' => 'float'
	];

	protected $fillable = [
		'name',
		'code',
		'symbol_left',
		'symbol_right',
		'value',
		'base'
	];

	public function orders()
	{
		return $this->hasMany(Order::class);
	}
}
