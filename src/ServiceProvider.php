<?php

namespace UKTowns;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/uk-towns.php' => config_path('uk-towns.php'),
            ], 'config');


            $this->commands([
                \UKTowns\Console\ImportTableToDatabase::class,
            ]);
        }
    }

    /**
     * @inheritDoc
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/uk-towns.php', 'uk-towns');
    }
}
