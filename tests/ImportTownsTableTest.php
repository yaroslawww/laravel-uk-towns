<?php

namespace UKTowns\Tests;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use UKTowns\Models\GeoTown;

class ImportTownsTableTest extends TestCase
{
    /** @test */
    public function import()
    {
        if (Schema::hasTable((new GeoTown())->getTable())) {
            GeoTown::query()->truncate();
            $this->assertEquals(0, GeoTown::count());
        }
        $this->artisan('uk-towns:import')->assertExitCode(0);
        $this->assertEquals(43143, GeoTown::count());
        $this->assertEquals(43143, DB::table('uk_towns')->count());
    }
}
