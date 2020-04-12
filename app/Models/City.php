<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class City
 *
 * @property int $id
 * @property int $region_id
 * @property string $zip_code
 * @property string $deleted_at
 * @property string $name
 *
 * @property Region $region
 * @property Collection|Address[] $addresses
 *
 * @package App\Models
 */
class City extends Model
{
	use SoftDeletes;
	protected $table = 'cities';
	public $timestamps = false;

	protected $casts = [
		'region_id' => 'int'
	];

	protected $fillable = [
		'region_id',
		'zip_code',
        'name'
	];

	public function region()
	{
		return $this->belongsTo(Region::class);
	}

	public function addresses()
	{
		return $this->hasMany(Address::class);
	}
}
