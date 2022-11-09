<?php

namespace UKTowns\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ImportTownsToDatabase extends Command
{
    protected $signature = 'uk-towns:import
    ';

    protected $description = 'Import towns table to database.';

    public function handle(): int
    {
        $sqlScript = file_get_contents(__DIR__.'/../../storage/uk-towns.sql');
        if (!$sqlScript) {
            $this->error('Script not found.');

            return 1;
        }
        $sqlScript  = Str::replace('geo_towns', config('uk-towns.tables.towns'), $sqlScript);
        $sqlScripts = explode('-- statement', $sqlScript);
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        foreach ($sqlScripts as $sqlScript) {
            DB::statement(trim($sqlScript));
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        return 0;
    }
}
