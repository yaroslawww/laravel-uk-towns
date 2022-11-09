<?php

namespace UKTowns\Models;

use Illuminate\Database\Eloquent\Factories\Factory;

class GeoPostcodeFactory extends Factory
{
    protected $model = GeoTown::class;

    public function definition()
    {
        return [
            'postcode'         => $this->faker->postcode(),
            'postcode_compact' => $this->faker->postcode(),
            'description'      => "{$this->faker->city()}, {$this->faker->country()}",
            'place'            => $this->faker->city(),
            'country'          => $this->faker->country(),
            'latitude'         => $this->faker->latitude(),
            'longitude'        => $this->faker->longitude(),
        ];
    }
}
