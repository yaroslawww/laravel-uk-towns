<?php

namespace UKTowns\Console;

use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use UKTowns\Models\GeoPostcode;

class ImportPostcodesToDatabase extends Command
{
    protected $signature = 'uk-towns:postcodes:import
    {--no-truncate : Flag to prevent truncate table before upload}
    ';

    protected $description = 'Import postcodes table to database.';

    public function handle(): int
    {
        $tableName = (new GeoPostcode())->getTable();

        if (!Schema::hasTable($tableName)) {
            Schema::create($tableName, function (Blueprint $table) {
                $table->string('postcode', 50)->primary();
                $table->string('postcode_compact', 50)->index();
                $table->string('description', 255);
                $table->string('place', 200)->nullable();
                $table->string('country', 200)->nullable();
                $table->decimal('latitude', 10, 7)->index();
                $table->decimal('longitude', 10, 7)->index();
                $table->timestamps();
            });
        }

        if (!$this->option('no-truncate')) {
            DB::table($tableName)->truncate();
        }

        for ($i = 0; $i <= 3; $i++) {
            $filePath  = __DIR__."/../../storage/uk-postcodes-{$i}.csv";
            $sqlScript = "LOAD DATA LOCAL INFILE '{$filePath}'
            INTO TABLE `{$tableName}`
            CHARACTER SET  '{$this->character()}'
            FIELDS TERMINATED BY ','
            OPTIONALLY ENCLOSED BY '\"'
            LINES TERMINATED BY '\n'
            IGNORE 1 LINES
            (
            postcode,
            postcode_compact,
            description,
            place,
            country,
            latitude,
            longitude,
            created_at,
            updated_at
            )";

            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::statement(trim($sqlScript));
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }

        return 0;
    }

    protected function character(): string
    {
        return 'utf8mb4';
    }
}
