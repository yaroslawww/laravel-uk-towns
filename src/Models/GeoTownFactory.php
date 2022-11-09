<?php

namespace UKTowns\Models;

use Illuminate\Database\Eloquent\Factories\Factory;

class GeoTownFactory extends Factory
{
    protected $model = GeoTown::class;

    public function definition()
    {
        return [
            'place_name'     => $this->faker->city(),
            'county'         => $this->faker->city(),
            'country'        => $this->faker->city(),
            'grid_reference' => $this->faker->word(),
            'easting'        => random_int(0, 999),
            'northing'       => random_int(0, 999),
            'latitude'       => $this->faker->latitude(),
            'longitude'      => $this->faker->longitude(),
            'postcode_area'  => $this->faker->postcode(),
            'type'           => 'Other',
        ];
    }
}
