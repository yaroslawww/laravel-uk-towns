<?php

namespace UKTowns\Tests;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use UKTowns\Models\GeoPostcode;

class ImportPostcodesTableTest extends TestCase
{
    /** @test */
    public function import()
    {
        if (Schema::hasTable((new GeoPostcode())->getTable())) {
            GeoPostcode::query()->truncate();
            $this->assertEquals(0, GeoPostcode::count());
        }
        $this->artisan('uk-towns:postcodes:import')->assertExitCode(0);
        $this->assertEquals(1791546, GeoPostcode::count());
        $this->assertEquals(1791546, DB::table('uk_postcodes')->count());
    }
}
