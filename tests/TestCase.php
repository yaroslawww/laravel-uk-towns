<?php

namespace UKTowns\Tests;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            \UKTowns\ServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'mysql');
        $app['config']->set(
            'database.connections.mysql',
            array_merge(
                $app['config']->get('database.connections.mysql'),
                env('CI') ? (include __DIR__ . '/db_config_ci.php') : (include __DIR__ . '/db_config.php')
            )
        );

        $app['config']->set('uk-towns.table_name', 'uk_towns');
    }
}
