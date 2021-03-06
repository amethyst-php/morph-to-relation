<?php

namespace Amethyst\Tests;

abstract class BaseTest extends \Orchestra\Testbench\TestCase
{
    /**
     * Setup the test environment.
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate:fresh');
    }

    protected function getPackageProviders($app)
    {
        return [
            \Amethyst\Providers\MorphToRelationServiceProvider::class,
            \Amethyst\Providers\FooServiceProvider::class,
            \Amethyst\Providers\RelationServiceProvider::class,
        ];
    }
}
