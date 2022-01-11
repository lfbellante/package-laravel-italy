<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Lfbellante\PackageLaravelItaly\Models\Province;
use Lfbellante\PackageLaravelItaly\Models\Region;

class ProvinceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Province::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'region_id' => Region::all()->random(),
            'code' => $this->faker->numberBetween(1,330303),
            'name' => $this->faker->word,
        ];
    }
}
