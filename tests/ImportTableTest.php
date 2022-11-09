<?php

namespace UKTowns\Tests;

use Illuminate\Support\Facades\DB;
use UKTowns\Models\GeoTown;

class ImportTableTest extends TestCase
{
    /** @test */
    public function import()
    {
        $this->artisan('uk-towns:import')->assertExitCode(0);
        $this->assertEquals(43143, GeoTown::count());
        $this->assertEquals(43143, DB::table('uk_towns')->count());
    }
}
