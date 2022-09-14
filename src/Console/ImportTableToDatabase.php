<?php

namespace UKTowns\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ImportTableToDatabase extends Command
{
    protected $signature = 'uk-towns:import
    ';

    protected $description = 'Import table to database.';

    public function handle(): int
    {
        $sqlScript = file_get_contents(__DIR__.'/../../storage/uk-towns.sql');
        if (! $sqlScript) {
            $this->error('Script not found.');

            return 1;
        }
        $sqlScript = Str::replace('geo_towns', config('uk-towns.table_name'), $sqlScript);
        $sqlScripts = explode('-- statement', $sqlScript);
        foreach ($sqlScripts as $sqlScript) {
            DB::statement(trim($sqlScript));
        }

        return 0;
    }
}
