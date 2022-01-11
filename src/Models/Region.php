<?php

namespace Lfbellante\PackageLaravelItaly\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends Model
{
	use HasFactory, SoftDeletes;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'code',
		'name',
	];

	/**
	 * The "booted" method of the model.
	 *
	 * @return void
	 */
	protected static function booted()
	{
		static::addGlobalScope('ordered', function (Builder $builder) {
			$builder->orderBy('name', 'ASC');
		});
	}


    /**
     * The collection of provinces
     */
    public function provinces(): HasMany
    {
        return $this->hasMany(Province::class);
    }
}