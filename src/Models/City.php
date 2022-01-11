<?php

namespace Lfbellante\PackageLaravelItaly\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'province_id',
        'name',
        'cadastral_code',
        'istat_code',
        'residents',
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
     * The province relationship
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class)->withTrashed();
    }

}