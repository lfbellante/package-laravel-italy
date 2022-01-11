<?php

namespace Lfbellante\PackageLaravelItaly\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'region_id',
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
     * The region relationship
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class)->withTrashed();
    }

    /**
     * The list of cities
     */
    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }
}