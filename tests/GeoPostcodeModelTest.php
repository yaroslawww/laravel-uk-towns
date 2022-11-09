<?php

namespace UKTowns\Tests;

use Illuminate\Support\Facades\Schema;
use UKTowns\Models\GeoPostcode;

class GeoPostcodeModelTest extends TestCase
{
    /** @test */
    public function country_options()
    {
        if (!Schema::hasTable((new GeoPostcode())->getTable())) {
            $this->artisan('uk-towns:postcodes:import');
        }

        $geoPostcode = GeoPostcode::query()
                                  ->nearestInKilometers(57.1496, -2.0969, 1)
                                  ->first();

        $this->assertEquals('AB10 1AB', $geoPostcode->postcode);
    }
}
