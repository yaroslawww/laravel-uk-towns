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

        $options                                = $app['config']->get('database.connections.mysql.options') ?? [];
        $options[\PDO::MYSQL_ATTR_LOCAL_INFILE] = true;
        $app['config']->set('database.connections.mysql.options', $options);

        $app['config']->set('uk-towns.tables.towns', 'uk_towns');
        $app['config']->set('uk-towns.tables.postcodes', 'uk_postcodes');
    }
}
