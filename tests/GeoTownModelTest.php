<?php

namespace UKTowns\Tests;

use Illuminate\Support\Facades\Schema;
use UKTowns\Models\GeoTown;

class GeoTownModelTest extends TestCase
{
    /** @test */
    public function country_options()
    {
        if (!Schema::hasTable((new GeoTown())->getTable())) {
            $this->artisan('uk-towns:import');
        }

        $this->assertCount(4, GeoTown::countryOptions());
        $this->assertCount(12, GeoTown::regionOptions());
        $this->assertCount(10, GeoTown::regionOptions('England'));
        $this->assertCount(108, GeoTown::countyOptions());
        $this->assertCount(6, GeoTown::countyOptions('West Midlands'));
        $this->assertCount(1199, GeoTown::townOptions('Kent'));
    }
}
