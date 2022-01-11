<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Lfbellante\PackageLaravelItaly\Models\City;
use Lfbellante\PackageLaravelItaly\Models\Province;

class CityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = City::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'province_id' => Province::all()->random(),
            'name' => $this->faker->word,
            'cadastral_code' => $this->faker->randomLetter . $this->faker->numberBetween(1,500),
            'istat_code' => $this->faker->numberBetween(1,330303),
            'residents' => $this->faker->numberBetween(1,999999),
        ];
    }
}
