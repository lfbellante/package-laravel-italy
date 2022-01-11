<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Lfbellante\PackageLaravelItaly\Models\Region;

class RegionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Region::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->numberBetween(1,330303),
            'name' => $this->faker->word,
        ];
    }
}
