<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

/**
 * Class Brand
 *
 * @property int $id
 * @property string $name
 * @property string $alias
 * @property string $description
 * @property string $image
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $deleted_at
 *
 * @property Collection|Product[] $products
 *
 * @package App\Models
 */
class Brand extends Model
{
	use SoftDeletes;
	protected $table = 'brands';

	protected $fillable = [
		'name',
		'alias',
		'description',
		'image'
	];

	public function products()
	{
		return $this->hasMany(Product::class);
	}
    public function getImageAttribute($value)
    {
        return asset(Storage::url("images/brand/".$value));
    }
}
