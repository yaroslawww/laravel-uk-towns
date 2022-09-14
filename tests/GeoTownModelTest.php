<?php

namespace UKTowns\Tests;

use UKTowns\Models\GeoTown;

class GeoTownModelTest extends TestCase
{
    /** @test */
    public function country_options()
    {
        $this->assertCount(4, GeoTown::countryOptions());
        $this->assertCount(12, GeoTown::regionOptions());
        $this->assertCount(10, GeoTown::regionOptions('England'));
        $this->assertCount(160, GeoTown::countyOptions());
        $this->assertCount(6, GeoTown::countyOptions('West Midlands'));
        $this->assertCount(1199, GeoTown::townOptions('Kent'));
    }
}
